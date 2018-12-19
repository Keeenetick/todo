<?php
require 'db.php';
$id = $_GET['id'];
$delete = R::load('lists', $id);
R::trash($delete);
header('Location: /');