/**
 *
 * @param name A label given to this Worker
 * @param src THe path to the worker script
 * @param onmessage A function to listen for incoming messages from the Worker's process
 * @param onerror A function to listen for incoming errors from the Worker's process
 * @constructor
 */
function WorkerModel(name , src, onmessage, onerror){
    this.name = name;
    this.baseWorker = null;
    this.src = src;
    this.onmessage = onmessage;
    this.onerror = onerror;

    if (typeof (Worker) !== "undefined") {
            this.baseWorker = new Worker(src);
            this.baseWorker.name = name;
        this.baseWorker.onmessage = onmessage;
        this.baseWorker.onerror = onerror;
    }
}


WorkerModel.prototype.postMessage = function (message, transferable){
    this.baseWorker.postMessage.apply(this.baseWorker, this.postMessage.arguments);
    this.dead = false;
};


WorkerModel.prototype.stop = function (){
    this.baseWorker.terminate();
    this.dead = true;
    this.baseWorker = undefined;
};


WorkerModel.prototype.recreate = function (){
    this.baseWorker = new Worker(this.src);
    this.dead = false;
    this.baseWorker.onmessage = this.onmessage;
    this.baseWorker.onerror = this.onerror;
};


