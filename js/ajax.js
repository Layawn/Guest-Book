let start = 0;
loadMessages();
function loadMessages() {
    $.ajax({
        url: "funcs.php?start=" +start,
        dataType: 'json',
        success: function (data) {
            data.forEach(item => {
                let div = document.createElement('div');
                div.className = "message";
                div.innerHTML = `<p>Автор: ${item.name} | Дата: ${item.date} </p> <div>${item.text}</div>`;
                document.querySelector(".message-box").prepend(div);
                start = item.id;
            })
            loadMessages();
        }
    });
}
$(".message-send__form").submit(function () {
    var userName = $("#inputName").val().trim();
    var messageText = $("#inputText").val();
    if (userName == '' || messageText == '')
    {
        alert('Не все поля заполнены');
        return false;
    }
    $.ajax({
        url: "funcs.php",
        type: "POST",
        data: {
            name: userName,
            text: messageText
        },
        success: function () {
            $('#inputText').val('');
        }
    });
    return false;
})