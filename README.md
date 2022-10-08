# Guest Book
 
This is my study project. I used AJAX requests to update the list of new messages from database. 

This project was created to learn how to create dynamic page named "Guest Book" using HTML, CSS, PHP, JS (jQuery), MySQL.

The guest book is a web page with text fields and a send message button. Each post is loaded dynamically (no page refresh).

### Quick installation in 2 steps
1. Import gb.sql to your MySQL database
2. Set database, username and password in connect.php
```php
$db = @new mysqli('localhost', 'root', '', 'gb');
```
