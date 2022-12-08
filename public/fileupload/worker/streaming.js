// importScripts('C:\Bitnami\wampstack-7.4.25-0\docs\newzooter\public\fileupload\const.js');
importScripts('../const.js');



let connection;

let connected = false;


function FileInfo(email, uid, name, size, type,  extension,websocketURL) {
    this.email = email;
    this.uid = uid;
    this.name = name;
    this.size = size;
    this.type = type;
    this.extension = extension;
    this.websocketURL = websocketURL;
}

/**
 *
 * @type Boolean Used to indicate that the user wants to be bound to the server.
 * It does not indicate that the user is bound.
 * To be sure that the user is bound, check the value
 * of the  variable.
 */
let connectionStarted = false;

function logOut() {
    if (connected) {
        connectionStarted = false;
        // connection.onclose = function () {}; // disable onclose handler first
        connection.close();
        connected = false;
    }
}




function connect(url) {
    connection = new WebSocket(url);
}

function initConnection(fileInfo) {
    connect(fileInfo.websocketURL);

    connection.onopen = function (event) {
        connection.binaryType = "arraybuffer";
        connected = true;
        // const msg = {
        //     text: "Connected to document streaming upload service",
        //     time: new Date().getTime(),
        //     type: NOTIF_TYPES.OPENING
        // };
        // postMessage(msg);

    };
    connection.onmessage = function (e) {

        let json = e.data , hasChunks = false;

        let msg = JSON.parse(json);
        switch (msg.flag){
            case WS_FLAGS.CONNECTED:
                sendUploadStartCommand(fileInfo);
                break;
            case WS_FLAGS.DISCONNECTED:

                break;
            case WS_FLAGS.FILE_OPENED:
//We disabled acknowledgements for faster uploads.
                break;
            case WS_FLAGS.ERROR:

                break;
            case WS_FLAGS.PROGRESS:

                break;
            case WS_FLAGS.CHUNK_ACK:

//We disabled acknowledgements for faster uploads.
                // hasChunks = sendBinaryMessage(fileInfo , fileBuffer);
                // if(hasChunks === false){
                //     sendUploadEndCommand(fileInfo , user);
                // }
                break;
            case WS_FLAGS.SUCCESS:

                break;
            default:

                break;
        }

        msg.type = NOTIF_TYPES.UPSTREAM;
        postMessage(msg);

    };

    connection.onerror = function (e) {

        connected = false;
        logOut();
        const msg = {
            text: "Error occurred. Disconnected.",
            time: new Date().getTime(),
            type: NOTIF_TYPES.ERROR
        };
        postMessage(msg);
    };
    connection.onclose = function (e) {

        connected = false;

        const msg = {
            text: "Normal Disconnection",
            time: new Date().getTime(),
            type: NOTIF_TYPES.CLOSING
        };
        //  postMessage(msg);
    };

}



function refresher() {
    if (connectionStarted && !connected) {
        //  initConnection();
    }
}


/*WebWorker Code*/


onmessage = e => {
    const message = e.data;
    if (e.data.constructor.name === 'ArrayBuffer') {
        if (connected === true) {
            connection.send(e.data);
        }
    } else {
        const fileInfo = new FileInfo(message.senderEmail, message.senderUid, message.fileName, message.fileSize, message.fileType, message.fileExtension, message.websocketURL);
        if (message.status === 'start') {
             // console.log('"start" command in worker\'s onmessage...', JSON.stringify(fileInfo));
            initConnection(fileInfo);
        } else if (message.status === 'new') {
              // console.log('"new" command in worker\'s onmessage');
            sendUploadNewFileCommand(fileInfo);
        }else if (message.status === 'end') {
               // console.log('"end" command in worker\'s onmessage');
            sendUploadEndCommand(fileInfo);
        }
    }
};

function sendUploadStartCommand(fileInfo) {
    let start = {};
    start.time = new Date().getTime();
    start.uid = fileInfo.uid;
    start.email = fileInfo.email;
    start.command = WS_START_UPLOAD;
    start.fileName = fileInfo.name;
    start.fileSize = fileInfo.size;
    start.fileExtension = fileInfo.extension;
    connection.send(JSON.stringify(start));
}

function sendUploadNewFileCommand(fileInfo){
    let ps = {};
    ps.time = new Date().getTime();
    ps.uid = fileInfo.senderUid;
    ps.email = fileInfo.email;
    ps.command = WS_NEW_FILE_UPLOAD;
    ps.fileName = fileInfo.name;
    ps.fileSize = fileInfo.size;
    ps.fileExtension = fileInfo.extension;
    connection.send(JSON.stringify(ps));
}

function sendUploadEndCommand(fileInfo){
    let end = {};
    end.time = new Date().getTime();
    end.uid = fileInfo.senderUid;
    end.email = fileInfo.email;
    end.command = WS_STOP_UPLOAD;
    end.fileName = fileInfo.name;
    end.fileSize = fileInfo.size;
    end.fileExtension = fileInfo.extension;
    connection.send(JSON.stringify(end));
}


function loadPdf(fileInfo) {

    console.log("pdfUrl........: ", fileInfo.url);


    fetch(fileInfo.url, {
        credentials: 'same-origin'
    })
        .then(function (response) {
            response.arrayBuffer()
                .then(function (buffer) {

                    //postMessage(buffer , [buffer]); //uncomment to send pdf arraybuffer to main thread

                });
        }).catch(function (err) {
        console.log(err.message);
        /* postMessage works when you return a string. */
        postMessage({error: err.message});


        setTimeout(function () {
            throw err;
        });
    });

}





