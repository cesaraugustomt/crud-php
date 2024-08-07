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
                  <h4>Adicionar Receita Maluca
                    <a href="index.php" class="btn btn-danger float-end">
                      Voltar
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <form action="acoes.php" method="POST">
                  <div class="mb-3">
                    <label for="imagem">Imagem url</label>
                    <input type="text" name="imagem" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="ingredientes">Ingredientes</label>
                    <textarea name="ingredientes" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="modo_preparo">Modo de Preparo</label>
                    <textarea name="modo_preparo" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="data">Data da Receita</label>
                    <input type="date" name="data" class="form-control">
                  </div>
                  <div class="mb-3">
                  <button type="submit" name="create_receita" class="btn btn-primary">
                        Salvar
                  </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
     </div>
  </body>
</html>