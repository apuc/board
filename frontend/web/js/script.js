$(document).ready(function () {


    /*    var modal = $('.myModal');
     var btn = $('.myBtn');
     var span = $('.close')[0];
     //console.log(modal);

     // When the user clicks on the button, open the modal
     $('.myBtn').click(function() {
     modal.show();
     });

     // When the user clicks on <span> (x), close the modal
     $('.close').click(function() {
     modal.hide();
     });

     // When the user clicks anywhere outside of the modal, close it
     window.onclick = function(event) {
     if (event.target == modal) {
     modal.hide();
     }
     }*/


    if(document.getElementById('help_form')){
        var valid = new Validation();
        valid.init({
            eventElement: '#submit_help',
            items: [
                {
                    item:'category',
                    errorMsg:'Обязательное поле'
                },
                {
                    item:'desct',
                    errorMsg:'Обязательное поле'
                },
                {
                    item:'email',
                    errorMsg:'Обязательное поле',
                    tpl:'email',
                    tplMsg: 'Не корректный email'
                }
            ],
            submitSuccess: function (err, form) {
                if (!err) {
                    alert("Спасибо за обращение. Ваш запрос будет обработан в течении 24 часов");
                    form.submit();
                }
            },
        })
    }

});