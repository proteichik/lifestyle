$('[name="btn-approve"]').click(function (event) {
    var message = "Опубликовать комментарий?";

    if (confirm(message)) {
        approveComment(event, this);
    } else {
        event.preventDefault();
        return false;
    }
});

function approveComment(event, target) {
    event.preventDefault();
    var targetUrl = $(target).attr("href");
    $.ajax({
        url: targetUrl,
        type: 'POST',
        beforeSend: function(request) {
            return request.setRequestHeader("X-CSRF-Token", $("meta[name='token']").attr('content'));
        }
    }).done(function () {
        location.reload(true);
    }).fail(function (data) {
        console.log(data.responseJSON.result);
    });
}