<?php
session_start();
require 'conexao.php';

if(isset($_POST['create_receita'])){
  $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagem']));
  $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
  $ingredientes = mysqli_real_escape_string($conexao, trim($_POST['ingredientes']));
  $modo_preparo = mysqli_real_escape_string($conexao, trim($_POST['modo_preparo']));
  $data = mysqli_real_escape_string($conexao, trim($_POST['data']));

  $sql = "INSERT INTO tb_receita (imagem, titulo, ingredientes, modo_preparo, data) VALUES ('$imagem', '$titulo', '$ingredientes', '$modo_preparo', '$data')";

  mysqli_query($conexao, $sql);

  if(mysqli_affected_rows($conexao) > 0) {
    $_SESSION['mensagem'] = "Receita criada com sucesso.";
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['mensagem'] = "A receita não foi criada.";
    header('Location: index.php');
    exit;
  }
}

if(isset($_POST['update_receita'])){
  $tb_receita_id = mysqli_real_escape_string($conexao, $_POST['receita_id']); 

  $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
  $ingredientes = mysqli_real_escape_string($conexao, trim($_POST['ingredientes']));
  $modo_preparo = mysqli_real_escape_string($conexao, trim($_POST['modo_preparo']));
  $data = mysqli_real_escape_string($conexao, trim($_POST['data']));

  $sql = "UPDATE tb_receita SET titulo = '$titulo', ingredientes = '$ingredientes', modo_preparo = '$modo_preparo', data = '$data' WHERE id = '$tb_receita_id'";

  mysqli_query($conexao, $sql);

  if(mysqli_affected_rows($conexao) > 0) {
    $_SESSION['mensagem'] = "Receita atualizada com sucesso.";
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['mensagem'] = "A receita não pode ser atualizada.";
    header('Location: index.php');
    exit;
  }
}

if(isset($_POST['delete_usuario'])){
  $tb_receita_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']); 

  $sql = "DELETE FROM tb_receita WHERE id = '$tb_receita_id'";
  mysqli_query($conexao, $sql);
  if(mysqli_affected_rows($conexao) > 0){
    $_SESSION['message'] = 'Receita deletada com sucesso';
    header('Location: index.php');
    exit;
  }else {
    $_SESSION['message'] = 'Receita não foi deleta';
    header('Location: index.php');
    exit;
  }
}
?>
