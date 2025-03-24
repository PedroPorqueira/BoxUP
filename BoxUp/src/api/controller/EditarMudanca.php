<?php
session_start();

include_once("../data.trait.php");

$idUsuario = $_SESSION["user"]["id"];
$status = $_POST["status"];
$idMudanca = $_POST["id"];

$service = new Service();

$result = $service->EditarStatus($idUsuario, $status, $idMudanca);

if (!$result["resultado"]) {
  http_response_code(400);
}

echo json_encode($result);
