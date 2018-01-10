function removeError()
{
    window.setTimeout(function() {
        $("#alertMessage").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);

    return this;
}