function pageChange(pageName) {
    window.location = (pageName + ".php")
}

jQuery(document).ready(function ($) {
    //haal de huidige locatie op en zoek de target link
    var path = window.location.pathname.split("/").pop();

    if ( path === '') {
        path = 'dashboard.php';
    }

    var target = $('.navbar .nav-item [id="' + path + '"]');
    //voeg de active class toe aan de juiste link
    target.addClass('active');
});

$(function(){
    $('#myForm').on('submit', function(e){
        e.preventDefault();
        $.post('http://www.somewhere.com/path/to/post',
            $('#myForm').serialize(),
            function(data, status, xhr){
                // do something here with response;
            });
    });
});

$(document).ready(function () {
    var links = $('.navbar ul li a');
    $.each(links, function (key, va) {
        if (va.href == document.URL) {
            $(this).addClass('active');
        }
    });
});