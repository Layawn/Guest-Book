<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="message-send__form">
            <label class="text-field__label">Ваше имя:</label>
            <input type="text" name="name" class="text-field__input" id="inputName" placeholder="Name">
            <label class="text-field__label">Текст сообщения:</label>
            <textarea name="text" class="text-field__textarea" id="inputText" placeholder="Message"></textarea>
            <button type="submit" value="send" class="button">Отправить</button>
            <hr>
            <div class="message-box"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
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
                        //console.log(start);
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
    </script>
</body>
</html>