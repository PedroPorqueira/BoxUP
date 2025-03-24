<?php
include_once("../../data.trait.php");

// Permitir requisições de qualquer origem (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

// Impedir qualquer saída antes dos cabeçalhos
ob_start();

// Capturar os dados da requisição (JSON ou Formulário)
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Se não for JSON, tentar pegar do $_POST
if (!$data) {
    $data = $_POST;
}

// Verificar se todos os campos estão preenchidos
$requiredFields = ["nome", "email", "usuario", "cpf", "senha", "motorista", "preco"];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        http_response_code(400);
        echo json_encode(["error" => "O campo '{$field}' é obrigatório."]);
        ob_end_flush();
        exit;
    }
}

// Atribuir os valores recebidos
$nome = trim($data["nome"]);
$email = trim($data["email"]);
$usuario = trim($data["usuario"]);
$cpf = trim($data["cpf"]);
$senha = trim($data["senha"]);
$motorista = filter_var($data["motorista"], FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
$preco = filter_var($data["preco"], FILTER_VALIDATE_FLOAT);

// Criar instância do serviço e cadastrar usuário
$service = new Service();
$result = $service->Cadastrar($nome, $email, $senha, $cpf, $usuario, $motorista, $preco);

// Retornar erro caso o cadastro falhe
if (!$result["resultado"]) {
    http_response_code(400);
    echo json_encode($result);
    ob_end_flush();
    exit;
}

// Retornar sucesso
http_response_code(201);
echo json_encode($result);
ob_end_flush();
