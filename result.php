<?php
require_once 'connection.php';

if($_POST['search'])
    $search = $_POST['search'];

if(!$query = $mysqli->query("SELECT * FROM posts LEFT JOIN comments ON (comments.post_id=posts.id)
                                    WHERE comments.body LIKE '%$search%'"))
    print_r($mysqli->errno . $mysqli->error);

$result = $query->fetch_all(MYSQLI_ASSOC);

if(empty($result))
    print 'Нет записей с таким комментарием';

foreach ($result as $row) {
    print  'Id записи: ' . $row['post_id'];
    print '</br>';
    print 'Запись: ' . $row['title'];
    print '</br>';
    print 'Комментарий: ' . $row['body'];
    print '</br>';
    print '</br>';
}
