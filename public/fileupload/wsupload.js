/**
 *
 * @param url The websocket url to the server compatible with this client
 * @param blockSize The size of the file slice sent per stream
 * @param success A function to run when the upload is completed successfully... The signature is function(fids,scale,message);
 * Where `fids` is an array of the ids generated for the files that were uploaded; `scale` is 100 by default and message is a notification message from the server.
 * @param error A function to run when an error occurs during the upload...
 * @constructor
 */
 function WsUpload(url, blockSize, success, error){

    if(typeof  url === "undefined"){
        this.url = getWsUri();
    }else{
        this.url = url;
    }
    if(typeof this.blockSize === "number"){
        this.blockSize = blockSize;
    }
    else{
        this.blockSize = 16*1024;
    }



    if(success){
        if({}.toString.call(success) === '[object Function]'){
            this.success = success;
        }else{
            throw new Error('Please supply a function for your success callback')
        }
    }else{
        this.success = function (a , b){};
    }

    if(error){
        if({}.toString.call(error) === '[object Function]'){
            this.error = error;
        }else{
            throw new Error('Please supply a function for your error callback')
        }
    }else{
        this.error = function (a , b){};
    }


    this.worker = null;

    /**
     * Tracks the file index in a file upload(zero based)
     * @type {number}
     */
    this.cursor  = -1;

    this.bytesSent = 0;
}

/**
 * Call this to start an upload session
 * @param file The file to upload
 * @param uid The user's uid
 * @param email The user's email
 * @param progressBar The progress bar to track this upload
 * @param callback A function to run when the upload is complete
 */
WsUpload.prototype.start = function (file,uid, email, progressBar) {
    let self = this;
    let ext = this.checkFileExtension(file);

    let args = {};
    args.fileName = file.name
    args.fileSize = file.size
    args.fileType = ext.toLowerCase() === 'pdf' ? PDF_FILE_TYPE : DOC_FILE_TYPE;
    args.status = 'start';
    args.fileExtension = ext;
    args.websocketURL = this.url;
    args.senderUid = uid;
    args.senderEmail = email;

    if (this.worker !== null) {
        if(this.worker.dead === true){
            //reuse the worker
            this.worker.recreate();
        }else{
            throw new Error('An upload is in progress!');
        }
    } else {
        this.worker = new WorkerModel('upload-worker',
            PATH_TO_WORKER_SCRIPTS + 'streaming.js',
            function (e) {
                let obj = e.data;
                const notifType = obj.type;

                switch (notifType) {
                    case NOTIF_TYPES.OPENING:
                        break;
                    case NOTIF_TYPES.CLOSING:
                        console.log(obj.text);
                        break;
                    case NOTIF_TYPES.ERROR:
                        if (typeof self.error !== "undefined") {
                            progressBar.setValueDelayed(0, "", 1000);
                            self.error(obj.text, 100);
                        }
                        self.stop();
                        break;
                    case NOTIF_TYPES.UPSTREAM:

                        switch (obj.flag) {
                            case WS_FLAGS.CONNECTED:
                                break;
                            case WS_FLAGS.DISCONNECTED:

                                break;
                            case WS_FLAGS.FILE_OPENED:
                                self.fileSlicer(file, args, true);
                                break;
                            case WS_FLAGS.CHUNK_ACK:

                                break;
                            case WS_FLAGS.ERROR:
                                if (typeof self.error !== "undefined") {
                                    progressBar.setValueDelayed(0, "", 1000);
                                    self.error(obj.message);
                                }
                                self.stop();
                                return;
                            case WS_FLAGS.PROGRESS:
                                progressBar.setValue(obj.percent, "Uploading file");
                                break;
                            case WS_FLAGS.SUCCESS:
                                progressBar.setValueDelayed(0, "", 1000);
                                self.stop();
                                if (typeof self.success !== "undefined") {
                                    let resp = JSON.parse(obj.data);
                                    console.log(resp.fileIds.length);
                                    self.success(resp.fileIds, 100, "File Upload Complete");
                                }
                                break;
                            default:
                                break;
                        }
                        break;
                }
            },
            function (e) {
                if (typeof self.error !== "undefined") {
                    progressBar.setValueDelayed(0, "", 1000);
                    self.error(e.message);
                }
                self.stop();
                console.log(e.message);
                throw e;
            }
        );
    }
    this.worker.postMessage(args);

};



/**
 * Call this to start an upload session
 * @param files
 * @param uid The user's uid
 * @param email The user's email
 * @param progressBar The progress bar to track this upload
 */
WsUpload.prototype.startMultiple = function (files, uid, email, progressBar) {

    let netFileSize = 0;
    for(let i=0; i<files.length; i++){
        netFileSize += files[i].size;
    }
    let self = this;
    if (this.worker !== null) {
        if(this.worker.dead === true){
            //reuse the worker
            this.worker.recreate();
        }else{
            throw new Error('An upload is in progress!');
        }
    } else {
        this.worker = new WorkerModel('upload-worker',
            PATH_TO_WORKER_SCRIPTS + 'streaming.js',
            function (e) {
                let obj = e.data;
                const notifType = obj.type;

                switch (notifType) {
                    case NOTIF_TYPES.OPENING:
                        break;
                    case NOTIF_TYPES.CLOSING:
                        console.log(obj.text);
                        break;
                    case NOTIF_TYPES.ERROR:
                        if (typeof self.error !== "undefined") {
                            progressBar.setValueDelayed(0, "", 1000);
                            self.error(obj.text);
                        }
                        self.stop();
                        break;
                    case NOTIF_TYPES.UPSTREAM:

                        switch (obj.flag) {
                            case WS_FLAGS.CONNECTED:
                                break;
                            case WS_FLAGS.DISCONNECTED:

                                break;
                            case WS_FLAGS.FILE_OPENED:
                                self.cursor += 1;
                                self.fileArraySlicer(files, uid, email, self.cursor === files.length - 1);
                                break;
                            case WS_FLAGS.CHUNK_ACK:

                                break;
                            case WS_FLAGS.ERROR:
                                if (typeof self.error !== "undefined") {
                                    progressBar.setValueDelayed(0, "", 1000);
                                    self.error(obj.message);
                                }
                                self.stop();
                                return;
                            case WS_FLAGS.PROGRESS:
                                let pct = (self.bytesSent / netFileSize) * 100;
                                pct = math.round(pct, 2);
                                progressBar.setValue(pct, "Uploading file");
                                break;

                            case WS_FLAGS.SUCCESS:
                                progressBar.setValueDelayed(0, "", 1000);
                                self.stop();
                                if (typeof self.success !== "undefined") {
                                    self.success(obj.data, 100, "File Upload Complete");
                                }
                                break;
                            default:
                                break;
                        }
                        break;
                }
            },
            function (e) {
                if (typeof self.error !== "undefined") {
                    progressBar.setValueDelayed(0, "", 1000);
                    self.error(e.message);
                }
                self.stop();
                console.log(e.message);
                throw e;
            }
        );
    }

    this.worker.postMessage(this.nextArgs(files, uid, email));
};

WsUpload.prototype.stop = function (){
    this.worker.stop();
    this.bytesSent = 0;
    this.cursor = -1;
};

WsUpload.prototype.checkFileExtension = function (file) {
    const fileName = file.name;
    return fileName.substring(fileName.lastIndexOf('.') + 1);
}

function getWsUri() {

    let loc = window.location, new_uri;
    if (loc.protocol === "https:") {
        new_uri = "wss:";
    } else {
        new_uri = "ws:";
    }
    let host = loc.host;

    new_uri += "//" + host;
    return new_uri + "/crowndocs/ws/upload/pdf?email=" + encodeURIComponent(user.email);
}

function getWsUriForMultipleUpload() {

    let loc = window.location, new_uri;
    if (loc.protocol === "https:") {
        new_uri = "wss:";
    } else {
        new_uri = "ws:";
    }
    let host = loc.host;

    new_uri += "//" + host;

    return new_uri + "/crowndocs/ws/upload/multiple/files?email=" + encodeURIComponent(user.email);
}


/**
 *  The `files` parameters is not called for the single file upload version
 * @param selectedFile
 * @param offset
 * @param nextArgs The metadata for the upload
 * @param last Checks if the current upload is the last file in the array
 * @param files An array of files to be uploaded
 */
WsUpload.prototype.slicer = function (selectedFile, offset, nextArgs, last, files) {
    let size = selectedFile.size;
    let self = this;
    if (offset < size) {
        let chunkSize = this.blockSize > size ? size : this.blockSize;
        let blob = selectedFile.slice(offset, offset + chunkSize); //slice the file by specifying the index(chunk size)
        let reader = new FileReader();
        reader.onload = function (e) {
            const buffer = e.target.result;
            self.worker.postMessage(buffer, [buffer]);
            self.bytesSent += chunkSize;
            offset += chunkSize;
            self.slicer(selectedFile, offset, nextArgs, last, files);

        };
        reader.readAsArrayBuffer(blob);
    } else {//sending done for current file: `selectedFile`
        if (offset > 0 && size > 0) {
            if (typeof last === "undefined" || last === true) {
                nextArgs.status = 'end';
                self.worker.postMessage(nextArgs);
            } else {
                if (typeof files !== "undefined") {
                    self.worker.postMessage(nextArgs);//make the server create a new upload for the next file
                }
            }
        }
    }
}

WsUpload.prototype.currentArgs = function (files, uid, email){
    let index = this.cursor;

    if (index < files.length) {
        let file = files[index];
        let ext = this.checkFileExtension(file);

        let args = {};
        args.fileName = file.name;
        args.fileSize = file.size;
        args.fileType = (ext.toLowerCase() === 'pdf') ? PDF_FILE_TYPE : (ext.toLowerCase() === 'doc' ? DOC_FILE_TYPE : GENERIC_FILE_TYPE);
        args.status = (index === 0) ? 'start' : 'new';
        args.fileExtension = ext;
        args.websocketURL = this.url;
        args.senderUid = uid;
        args.senderEmail = email;
        return args;
    }
}

WsUpload.prototype.nextArgs = function (files , uid, email){
    let index = this.cursor + 1;

    let args = {};
    if (index < files.length) {
        let file = files[index];
        let ext = this.checkFileExtension(file);

        args.fileName = file.name
        args.fileSize = file.size
        args.fileType = (ext.toLowerCase() === 'pdf') ? PDF_FILE_TYPE : (ext.toLowerCase() === 'doc' ? DOC_FILE_TYPE : GENERIC_FILE_TYPE);
        args.status = index === 0 ? 'start' : 'new';
        args.fileExtension = ext;
        args.websocketURL = this.url;
        args.senderUid = uid;
        args.senderEmail = email;
    } else {
        args = this.currentArgs(files, uid, email);
        args.status = 'end';
    }

    return args;
}

WsUpload.prototype.fileSlicer = function(selectedFile, args, last) {
    this.slicer(selectedFile, 0, args, last);
}

WsUpload.prototype.fileArraySlicer = function(files, uid, email, last) {
    this.slicer(files[this.cursor], 0, this.nextArgs(files, uid, email), last, files);
}