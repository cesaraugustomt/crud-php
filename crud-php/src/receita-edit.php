<?php 
session_start();
require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD PHP - Desenvolvimento web</title>
  </head>
  <body>
      <?php include('navbar.php'); ?>
     <div class="container mt-5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Editar Receita Maluca
                    <a href="index.php" class="btn btn-danger float-end">
                      Voltar
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                <?php 
                    if (isset($_GET['id'])){
                        $tb_receita_id = mysqli_real_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM tb_receita WHERE id='$tb_receita_id'";
                        $query = mysqli_query($conexao, $sql);

                        if(mysqli_num_rows($query) > 0) {
                          $tb_receita = mysqli_fetch_array($query);
                  ?>
                  <form action="acoes.php" method="POST">
                  <input type="hidden" name="receita_id" value="<?=$tb_receita['id']?>">
                  <div class="mb-3">
                    <label for="titulo">Imagem</label>
                    <input type="text" name="imagem" value="<?=$tb_receita['imagem']?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" value="<?=$tb_receita['titulo']?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="ingredientes">Ingredientes</label>
                    <textarea name="ingredientes" class="form-control" rows="3"><?=$tb_receita['ingredientes']?></textarea>

                  </div>
                  <div class="mb-3">
                    <label for="modo_preparo">Modo de Preparo</label>
                    <textarea name="modo_preparo" class="form-control" rows="5">
                    <?=$tb_receita['modo_preparo']?>
                    </textarea>
                  </div>
                  <div class="mb-3">
                    <label for="data">Data da Receita</label>
                    <input type="date" value="<?=$tb_receita['data']?>" name="data" class="form-control">
                  </div>
                  <div class="mb-3">
                  <button type="submit" name="update_receita" class="btn btn-primary">
                        Atualizar
                  </button>
                  </div>
                  </form>
                  <?php 
                     }else {
                        echo '<h5>Receita não encontrada.</h5>';
                      };
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
     </div>
  </body>
</html>