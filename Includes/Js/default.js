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
            $(this).closest('li').addClass('active');
        }
    });
});

var getButtonValue = function($button) {
    var label = $button.text();
    $button.text('');
    var buttonValue = $button.val();
    $button.text(label);
    return buttonValue;
};

function createNewRounds()
{
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            document.getElementsByName('createRounds') .innerHtml = xmlhttp.getResponseHeader();
            var client = new TournamentCls();
            var tournaments = client.TournamentCls.createNewRound("32");
        }
    };

    xmlhttp.open('POST', '../../Classes/TournamentCls.php', true);
    xmlhttp.send();
}