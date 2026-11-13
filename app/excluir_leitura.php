<?php
require_once __DIR__ . '/init.php';
$leituras = readAll(database(), "leituras");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete(database(), "leituras", "id = $id");
    header("Location: lancamento_de_dados.php");
    exit();
} else {
    echo "ID da leitura não fornecido.";
}