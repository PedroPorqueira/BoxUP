<?php
class Service
{
  protected $con;

  public function __construct()
  {
    try {
      $this->con = new PDO('mysql:host=localhost;dbname=boxup;', 'root', '');
    } catch (PDOException $erro) {
      echo 'Erro ao conectar com o MySQL: ' . $erro->getMessage();
    };
  }

  public function Cadastrar($nome, $email, $senha, $cpf, $usuario, $motorista, $preco): array
  {
    $retorno = [];

    try {
      $senhaCripto = md5($senha);
      $sql = "INSERT INTO usuario (nome, senha, usuario, cpf, email, motorista, preco) VALUES ('$nome', '$senhaCripto', '$usuario', '$cpf', '$email', $motorista, $preco)";

      $stmt = $this->con->prepare($sql);
      $stmt->execute();

      $retorno["data"] = "";
      $retorno["message"] = "Usuario cadastrado";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }

  public function Logar($email, $senha): array
  {
    $retorno = [];

    try {
      $senhaCripto = md5($senha);
      $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senhaCripto'";

      $query = $this->con->query($sql);

      $usuario = $query->fetch(PDO::FETCH_ASSOC);

      if (!$usuario) {
        $retorno["error"] = "Erro ao logar!";
        $retorno["resultado"] = false;
        $retorno["data"] = "";
      } else {
        $retorno["data"] = $usuario;
        $retorno["message"] = "Usuário Logado";
        $retorno["resultado"] = true;
      }
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }

  public function CriarMudanca($idUsuario, $objetos, $enderecoInicial, $enderecoFinal, $km, $observacoes)
  {
    $retorno = [];

    try {
      $sql = "SELECT id FROM usuario
        WHERE motorista = 1
        ORDER BY RAND()
        LIMIT 1;
      ";

      $query = $this->con->query($sql);
      $idMotorista = $query->fetch(PDO::FETCH_ASSOC)["id"];
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";

      return $retorno;
    }

    try {
      $sql = "INSERT INTO mudanca (id_usuario, id_motorista, objetos, endereco_inicial, endereco_final, km, observacoes) VALUES ('$idUsuario', '$idMotorista', '$objetos', '$enderecoInicial', '$enderecoFinal', $km, '$observacoes')";

      $stmt = $this->con->prepare($sql);
      $stmt->execute();

      $retorno["data"] = "";
      $retorno["message"] = "Mudanca cadastrada";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }

  public function BuscarMudancasMotoristas($idUsuario)
  {
    $retorno = [];

    try {
      $sql = "SELECT * FROM mudanca inner join usuario on usuario.id = mudanca.id_motorista where mudanca.id_motorista = $idUsuario";

      $query = $this->con->query($sql);

      $mudancas = $query->fetchAll(PDO::FETCH_ASSOC);


      $retorno["data"] = $mudancas;
      $retorno["message"] = "Sucesso!";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }

  public function BuscarMudancas($idUsuario)
  {
    $retorno = [];

    try {
      $sql = "SELECT * FROM mudanca inner join usuario on usuario.id = mudanca.id_motorista where mudanca.id_usuario = $idUsuario";

      $query = $this->con->query($sql);

      $mudancas = $query->fetchAll(PDO::FETCH_ASSOC);


      $retorno["data"] = $mudancas;
      $retorno["message"] = "Sucesso!";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }


  public function EditarStatus($idUsuario, $status, $id): array
  {
    $retorno = [];

    try {
      $sql = "UPDATE mudanca SET status = $status where id_motorista = $idUsuario AND id = $id";
      $stmt = $this->con->prepare($sql);

      $stmt->execute();

      $retorno["data"] = "";
      $retorno["message"] = "Status Editado";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }

  public function ExcluiMudanca($idMudanca)
  {
    $retorno = [];

    try {
      $sql = "DELETE FROM mudanca WHERE id = $idMudanca";
      $stmt = $this->con->prepare($sql);

      $stmt->execute();

      $retorno["data"] = "";
      $retorno["message"] = "Mudança excluída";
      $retorno["resultado"] = true;
    } catch (PDOException $e) {
      $retorno["error"] = $e->getMessage();
      $retorno["resultado"] = false;
      $retorno["data"] = "";
    }

    return $retorno;
  }
}
