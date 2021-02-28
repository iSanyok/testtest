<?php
require_once 'connection.php';

$posts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$comments = file_get_contents('https://jsonplaceholder.typicode.com/comments');

$posts = json_decode($posts);
$comments = json_decode($comments);

if (!$posts_query = $mysqli->prepare("INSERT INTO posts(id, user_id, title, body) VALUES (?, ?, ?, ?)")) {
    print "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$posts_query->bind_param('iiss', $id, $user_id, $title, $body)) {
    print "Не удалось привязать параметры: (" . $mysqli->errno . ") " . $mysqli->error;
}

foreach ($posts as $post) {
    $id = $post->id;
    $user_id = $post->userId;
    $title = $post->title;
    $body = $post->body;

    $posts_query->execute();
}

if (!$comments_query = $mysqli->prepare("INSERT INTO comments(id, post_id, name, email, body) VALUES (?, ?, ?, ?, ?)")) {
    print "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$comments_query->bind_param('iisss', $id, $post_id, $name, $email, $body)) {
    print "Не удалось привязать параметры: (" . $mysqli->errno . ") " . $mysqli->error;
}

foreach ($comments as $comment) {
    $id = $comment->id;
    $post_id = $comment->postId;
    $name = $comment->name;
    $email = $comment->email;
    $body = $comment->body;

    $comments_query->execute();
}
