/**
 * Plugin Hinting box for Head Employee field
 */
$(document).ready(function () {

    var input = $('#head_name');
    var token = $('meta[name="csrf-token"]').attr('content');

    input.keyup(function () {
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

    function draw(data) {
        var draw = '';
        var list = JSON.parse(data);
        for(var i = 0; i < list.length; i++) {
            draw += '<p data-id="' + list[i].id + '" class="hint-item">' + list[i].name + '</p>';
        }

        $('.hint-content').html(draw).css('display', 'block');

        $('.hint-item').mouseup(function() {
            var id = $(this).attr('data-id');
            var data = $(this).text();
            choose(id, data);
            $('.hint-content').html(draw).css('display', 'none');
        });
    }

    input.focus(function(){
        $('.hint-content').css('display', 'block');
    });

    input.focusout(function(){
        setTimeout(function(){
            $('.hint-content').css('display', 'none');
        }, 100); // time to catch choose event
    });

    function choose(id, data) {
        input.val(data);
        $('input[name="head"]').val(id);
    }

    function deleteEmployee(id, name) {
        var frame = $('#confirm-modal');
        frame.attr('data-id', id);
        frame.modal('show');
        $('#modal-message').text('Are you sure you want to remove employee: ' + name);
    }

});
