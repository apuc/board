function Img() {

    this.init = function (elem) {
        this.elem = this.getElement(elem);
        return this;
    }

    this.getPreview = function(imgId,callback) {
        imgId = imgId || false;
        callback = callback || function () {};
        if (this.elem.files) {
            var reader = new FileReader();
            reader.readAsDataURL(this.elem.files[0]);
            var obj = this;
            reader.onload = function (e) {
                if(imgId){
                    var img = obj.getElement(imgId);
                    img.setAttribute('src',e.target.result);
                }
                obj.setImgParams(e.target);
                callback(e.target,e.target.result);
                //$('#blah').attr('src', e.target.result);
            };

        }
        return this;
    }

    this.setImgParams = function (img) {
        this.src = img.result;
    }

    this.getElement = function (el) {
        var thisElement;

        if(typeof el === 'object'){
            return el;
        }

        if (el[0] === '#') {
            thisElement = document.getElementById(el.slice(1));
        }
        else {
            thisElement = document.getElementsByClassName(el.slice(1));
        }
        return thisElement;
    }

    this.test = function () {
        console.log(this);
    }
}

var img = function (elem) {
    var obj = new Img();
    return obj.init(elem);
}