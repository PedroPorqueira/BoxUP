<?php
class Service
{
    protected $con;

    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=boxup;charset=utf8', 'root', '');
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            die(json_encode(['error' => 'Erro ao conectar com o MySQL: ' . $erro->getMessage()]));
        }
    }

    public function Cadastrar($nome, $email, $senha, $cpf, $usuario, $motorista, $preco): array
{
    $retorno = [];

    try {
        if (empty($nome) || empty($email) || empty($senha) || empty($cpf) || empty($usuario) || !isset($motorista) || !isset($preco)) {
            return ["error" => "Todos os campos são obrigatórios.", "resultado" => false];
        }

        // Criptografar senha corretamente
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

        // Query usando prepared statements
        $sql = "INSERT INTO usuario (nome, senha, usuario, cpf, email, motorista, preco) 
                VALUES (:nome, :senha, :usuario, :cpf, :email, :motorista, :preco)";

        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senhaCripto, PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":motorista", $motorista, PDO::PARAM_INT);
        $stmt->bindParam(":preco", $preco, PDO::PARAM_INT);

        $stmt->execute();

        $retorno["message"] = "Usuário cadastrado com sucesso!";
        $retorno["resultado"] = true;
    } catch (PDOException $e) {
        $retorno["error"] = "Erro no banco de dados: " . $e->getMessage();
        $retorno["resultado"] = false;
    }

    return $retorno;
}

    public function Logar($email, $senha): array
    {
        $retorno = [];

        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$usuario || !password_verify($senha, $usuario['senha'])) {
                return ["error" => "Erro ao logar!", "resultado" => false, "data" => ""];
            }

            return ["data" => $usuario, "message" => "Usuário Logado", "resultado" => true];
        } catch (PDOException $e) {
            return ["error" => $e->getMessage(), "resultado" => false, "data" => ""];
        }
    }

    public function CriarMudanca($idUsuario, $objetos, $enderecoInicial, $enderecoFinal, $km, $observacoes)
    {
        $retorno = [];

        try {
            $sql = "SELECT id FROM usuario WHERE motorista = 1 ORDER BY RAND() LIMIT 1";
            $query = $this->con->query($sql);
            $idMotorista = $query->fetch(PDO::FETCH_ASSOC)["id"];

            $sql = "INSERT INTO mudanca (id_usuario, id_motorista, objetos, endereco_inicial, endereco_final, km, observacoes) 
                    VALUES (:idUsuario, :idMotorista, :objetos, :enderecoInicial, :enderecoFinal, :km, :observacoes)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(":idMotorista", $idMotorista, PDO::PARAM_INT);
            $stmt->bindParam(":objetos", $objetos, PDO::PARAM_STR);
            $stmt->bindParam(":enderecoInicial", $enderecoInicial, PDO::PARAM_STR);
            $stmt->bindParam(":enderecoFinal", $enderecoFinal, PDO::PARAM_STR);
            $stmt->bindParam(":km", $km, PDO::PARAM_INT);
            $stmt->bindParam(":observacoes", $observacoes, PDO::PARAM_STR);

            $stmt->execute();

            return ["message" => "Mudança cadastrada", "resultado" => true];
        } catch (PDOException $e) {
            return ["error" => $e->getMessage(), "resultado" => false];
        }
    }

    public function BuscarMudancas($idUsuario)
    {
        try {
            $sql = "SELECT * FROM mudanca INNER JOIN usuario ON usuario.id = mudanca.id_motorista WHERE mudanca.id_usuario = :idUsuario";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            return ["data" => $stmt->fetchAll(PDO::FETCH_ASSOC), "message" => "Sucesso!", "resultado" => true];
        } catch (PDOException $e) {
            return ["error" => $e->getMessage(), "resultado" => false, "data" => ""];
        }
    }

    public function EditarStatus($idUsuario, $status, $id): array
    {
        try {
            $sql = "UPDATE mudanca SET status = :status WHERE id_motorista = :idUsuario AND id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":status", $status, PDO::PARAM_INT);
            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return ["message" => "Status Editado", "resultado" => true];
        } catch (PDOException $e) {
            return ["error" => $e->getMessage(), "resultado" => false, "data" => ""];
        }
    }

    public function ExcluirMudanca($idMudanca)
    {
        try {
            $sql = "DELETE FROM mudanca WHERE id = :idMudanca";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":idMudanca", $idMudanca, PDO::PARAM_INT);
            $stmt->execute();
            return ["message" => "Mudança excluída", "resultado" => true];
        } catch (PDOException $e) {
            return ["error" => $e->getMessage(), "resultado" => false, "data" => ""];
        }
    }
}
