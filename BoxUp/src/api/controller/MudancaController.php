<?php
session_start();
include_once("../data.trait.php");

$idUsuario = $_SESSION["user"]["id"];
$objetos = $_POST["objetos"];
$enderecoInicial = $_POST["enderecoInicial"];
$enderecoFinal = $_POST["enderecoFinal"];
$km = $_POST["km"];
$observacoes = $_POST["observacoes"];

$service = new Service();

$result = $service->CriarMudanca($idUsuario, $objetos, $enderecoInicial, $enderecoFinal, $km, $observacoes);

if (!$result["resultado"]) {
  http_response_code(400);
}

if (!empty($result["data"])) {
  $_SESSION["user"] = $result["data"];
}

echo json_encode($result);
