
$(document).ready(function() {

    $(document).on('change',"#profile",function(event){
        $("#default_img").attr('src',URL.createObjectURL(event.target.files[0]))
    });

    // alert fade out
    $(".alert-danger").fadeOut(10000);
    // Tost

});