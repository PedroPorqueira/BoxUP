<?php
session_start();
include_once("../data.trait.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$service = new Service();

$result = $service->Logar($email, $senha);

if (!$result["resultado"]) {
  http_response_code(400);
}

if (!empty($result["data"])) {
  $_SESSION["user"] = $result["data"];
}

echo json_encode($result);
