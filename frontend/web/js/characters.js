function Characters() {

    this.setInput = function (elem, result_elem, callback) {
        callback = callback || false;
        var elemObj = this.getElement(elem);
        var elemRes = (result_elem) ? this.getElement(result_elem) : false;
        if(elemObj === null || elemRes === null) return false;
        var main = this;
        elemObj.onkeyup = function(){
            main.getCount(elemObj,elemRes,callback);
        };

    }

    this.getElement = function (el) {
        var thisElement;

        if (el[0] == '#') {
            thisElement = document.getElementById(el.slice(1));
        }
        else {
            thisElement = document.getElementsByClassName(el.slice(1));
        }
        return thisElement;
    }

    this.getCount = function (elem, result_elem, callback) {
        var maxCount = parseInt(elem.getAttribute('data-count'));
        var inputCount = elem.value.length;
        if(result_elem){
            result_elem.innerHTML = maxCount - inputCount;
        }
        else {
            callback(inputCount,maxCount);
        }
    }

}