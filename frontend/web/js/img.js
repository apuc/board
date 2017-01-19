function Img() {
    this.getPreview = function(input,imgId,callback) {
        imgId = imgId || false;
        callback = callback || function () {};
        if (input.files) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            var obj = this;
            reader.onload = function (e) {
                if(imgId){
                    var img = document.getElementById(imgId);
                    img.setAttribute('src',e.target.result);
                }
                obj.setImgParams(e.target);
                callback(e.target);
                //$('#blah').attr('src', e.target.result);
            };

        }
    }

    this.setImgParams = function (img) {
        this.src = img.result;
    }
}