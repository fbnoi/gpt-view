$(function() {
    $('.sessions').on('click', function () {
        $.get('/session/' + $(this).data('session-id')).then(function (res) {
            $('#page-main').html(res);
        });
    });

    $('#page-main').on('click', '.message-send', function () {
        let message = $('.chat-input').val();
        addMessageOut(message, "2022-12 08:45 PM");
        $.post('/api/session/chat', {'message': message}).then(function (res) {
            addMessage(message, "2022-12 08:45 PM");
        });
    });

    function addMessage(message, time) {
        let template = $($('#tpl-message').html());
        template.find('.message-text').html(message);
        template.find('.time').html(time);
        $('#message-list').append(template);
        let element = $(`.chat-body`);
        element.stop().animate({
            scrollTop: element.prop("scrollHeight")
        }, 500);
    }

    function addMessageOut(message, time) {
        let template = $($('#tpl-message-out').html());
        template.find('.message-text').html(message);
        template.find('.time').html(time);
        $('#message-list').append(template);
        let element = $(`.chat-body`);
        element.stop().animate({
            scrollTop: element.prop("scrollHeight")
        }, 500);
    }
});

