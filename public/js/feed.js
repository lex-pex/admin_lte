$(document).ready(function () {
    var input = $('#head');
    var token = $('meta[name="csrf-token"]').attr('content');
    input.keyup(function (event) {
        check(input.val());
    });
    function check(x) {
        $.post(
            '/staff/hint', {_token: token, x: x},
            function(data) {
                draw(data);
            }
        );
    }
    var list;
    function draw(data) {
        var draw = '';
        list = JSON.parse(data);
        for(var i = 0; i < list.length; i++)
            draw += '<p data-id="' + list[i].id + '" class="hint-item">' + list[i].name + '</p>';
        $('.hint-content').html(draw);
        $('.hint-item').mouseup(function() {
            var id = $(this).attr('data-id');
            var data = $(this).text();
            choose(id, data);
        });
    }

    function choose(id, data) {
        input.val(data);
        $('input[name="head"]').val(id);
        alert(id + ': ' + data);
    }

});










