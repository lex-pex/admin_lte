

$(document).ready(function () {

    var input = $('#head');

    var token = $('meta[name="csrf-token"]').attr('content');

    var str = 'Some data of mine...';

    var responce = null;

    $.post(
        '/staff/hint', { _token: token, str : str },
        function(data) {
            alert(data);
        }
    );

    // alert(responce);


});