<?php
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
include_once './Connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="shortcut icon" href="./img/icons/favicon-32x32.png" type="image/x-icon">
  <title>Formulário de Pagamento</title>
</head>
<body
    <?php
      $query_products = "SELECT id, name, price FROM products WHERE id=:id LIMIT 1";
      $result_products = $conn->prepare($query_products);
      $result_products->bindParam(':id', $id, PDO::FETCH_ASSOC);
      $result_products->execute();
      $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
      //var_dump($row_product);
      extract($row_product);
    ?>
  <div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./img/icons/favicon-32x32.png" alt="" width="72" height="72">
        <h2>Formulário de Pagamento</h2>
        <p class="lead">Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <div class="row mb-3">
      <div class="col-md-8">
        <h3><?php echo $name; ?></h3>
      </div>
      <div class="col-md-4">
        <div class="mb-1 text-muted"><?php echo number_format($price, 2, ",",".");?></div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-3">Informações Pessoais</h4>
        <form>
          <div class="row">
            <div class="col-md-6 mb-3">
            <label for="first_name">Nome</label>
              <input type="text" name="first_name" id="first_name" class="form-control" autofocus placeholder="Digite seu nome..." required>
            </div>
            <div class="col-md-6">
              <label for="last_name">Sobrenome</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Digite seu sobrenome..." required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="CPF">CPF</label>
              <input type="text" name="CPF" id="CPF" class="form-control" placeholder="CPF" required>
            </div>
            <div class="col-md-4">
              <label for="Telefone">Telefone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone com DDD..." required>
            </div>
              <div class="col-md-4">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="seu melhor e-mail..." required>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>