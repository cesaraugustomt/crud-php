<?php
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
                  <h4>Visualizar Receita Maluca
                    <a href="index.php" class="btn btn-danger float-end">
                      Voltar
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <?php 
                    if (isset($_GET['id'])){
                        $tb_receita = mysqli_real_escape_string($conexao, $_GET['id']);
                        $sql = "SELECT * FROM tb_receita WHERE id='$tb_receita'";
                        $query = mysqli_query($conexao, $sql);

                        if(mysqli_num_rows($query) > 0) {
                          $tb_receita = mysqli_fetch_array($query);
                  ?>
                     <div class="mb-3">
                    <label for="imagem">Imagem</label>
                    <p class="form-control">
                    <img style="width: 100px; height: 100px; object-fit: cover;" src="<?=$tb_receita['imagem']?>" alt="imagem" >
                    </p>
                  </div>
                  <div class="mb-3">
                    <label for="titulo">Título</label>
                    <p class="form-control">
                        <?=$tb_receita['titulo'] ?>
                    </p>
                  </div>
                  <div class="mb-3">
                    <label for="ingredientes">Ingredientes</label>
                    <p class="form-control">
                    <?=$tb_receita['ingredientes'] ?>
                      </p>
                  </div>
                  <div class="mb-3">
                    <label for="modo_preparo">Modo de Preparo</label>
                    <p class="form-control">
                    <?=$tb_receita['modo_preparo'] ?>
                      </p>
                  </div>
                  <div class="mb-3">
                    <label for="data">Data da Receita</label>
                    <p class="form-control">
                    <?=date('d/m/Y', strtotime($tb_receita['data']))?>
                      </p>
                  </div>
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