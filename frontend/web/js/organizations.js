$(document).ready(function(){

    var countInput = new Characters();
    countInput.setInput('#organizations-title','#title-count-res');
    countInput.setInput('#organizations-descr','#descr-count-res');

    $('#showOrgModal').on('click',function(){
        $('#categoryOrgModal').modal('show');
    });
});