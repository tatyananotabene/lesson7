<?php
if (empty($_POST['file_name'])) {
    header('Location: index.html');
    exit;
}

if (empty($_FILES['content']['name']) || $_FILES['content']['error'] !== UPLOAD_ERR_OK) {
    header('Location: index.html');
    exit;
}

$uploaddir = './upload';

if (!file_exists($uploaddir)) {
    mkdir($uploaddir, 0755, true);
}

$uploadfile = $uploaddir . '/' . basename($_POST['file_name']);

if (move_uploaded_file($_FILES['content']['tmp_name'], $uploadfile)) {
    echo 'Файл успешно загружен!' . '<br>';
    echo 'Путь к файлу: ' . realpath($uploadfile) . '<br>';
    echo 'Размер файла: ' . $_FILES['content']['size'] . ' байт';
} else {
    header('Location: index.html');
    exit;
}
