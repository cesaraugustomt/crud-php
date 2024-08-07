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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>CRUD PHP - Desenvolvimento web</title>
  </head>
  <body>
      <?php include('navbar.php'); ?>
      <div class="container mt-4">
        <?php include('mensagem.php'); ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Lista de receitas
                  <a href="receita-create.php" class="btn btn-primary float-end">Adicionar receita</a>
                  </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Ingredientes</th>
                        <th>Modo de preparo</th>
                        <th>Data</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = 'SELECT * FROM tb_receita';
                      $tb_receitas = mysqli_query($conexao, $sql);
                      if (mysqli_num_rows($tb_receitas) > 0) {
                        foreach($tb_receitas as $tb_receita) {
                      ?>
                      <tr>
                        <td><?=$tb_receita['id']?></td>
                        <td ><img style="width: 70px; height: 70px; object-fit: cover;" src="<?=$tb_receita['imagem']?>" alt="imagem" ></td>
                        <td><?=$tb_receita['titulo']?></td>
                        <td><?=$tb_receita['ingredientes']?></td>
                        <td><?=$tb_receita['modo_preparo']?></td>
                        <td><?=date('d/m/Y', strtotime($tb_receita['data']))?></td>
                        <td>
                          <a href="receita-view.php?id=<?=$tb_receita['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill">&nbsp;</span> Visualizar</a>
                          <a href="receita-edit.php?id=<?=$tb_receita['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill">&nbsp;</span>Editar</a>
                          <form action="acoes.php" method="POST" class="d-inline">
                              <button onClick="return confirm('Deseja mesmo excluir essa receita?')" type="submit" name="delete_usuario" value="<?=$tb_receita['id']?>" class="btn btn-danger btn-sm">
                              <span class="bi-trash3-fill">&nbsp;</span> Excluir
                              </button>
                          </form>
                        </td>
                      </tr>
                      <?php 
                         }
                          }
                        else {
                          echo '<h5>Nenhuma receita encontrada</h5>';

                        }
                      ?>
                    </tbody>
                </table>

                </div>
              </div>
            </div>
          </div>
      </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>