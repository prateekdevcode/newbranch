fabric.Canvas.prototype.getItemByMyID = function(myID) {
    var object = null,
        objects = this.getObjects();
    for (var i = 0, len = this.size(); i < len; i++) {
        if (objects[i].id&& objects[i].id=== myID) {
            object = objects[i];
            break;
        }
    }
    return object;
};