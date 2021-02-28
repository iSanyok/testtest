<?php
$mysqli = new mysqli('localhost', 'usr', '111', 'test');
if($mysqli->connect_errno) {
    print "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
