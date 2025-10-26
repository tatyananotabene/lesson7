<?php
if (empty($_FILES['file_name']['name'])) {
    header('Location: index.html');
    exit;
}
$uploaddir = './upload';
$uploadfile = $uploaddir . '/' . basename($_FILES['file_name']['name']);

if (move_uploaded_file($_FILES['file_name']['tmp_name'], $uploadfile)) {
        echo 'Файл загружен' . PHP_EOL . 'Путь к файлу:' . $uploadfile . PHP_EOL . 'Размер файла: ' . $_FILES['file_name']['size'];
} else {
        header('Location: index.html');
        exit;
        }

