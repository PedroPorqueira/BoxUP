<?php
session_start();

include_once("../data.trait.php");

$idUsuario = $_SESSION["user"]["id"];

$service = new Service();

$result = $service->BuscarMudancasMotoristas($idUsuario);

if (!$result["resultado"]) {
  http_response_code(400);
}

echo json_encode($result);
