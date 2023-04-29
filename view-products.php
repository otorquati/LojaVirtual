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
  <title>Detalhes do Produto</title>
</head>
<body>
    <?php
          include_once 'menu.php';
          $query_products = "SELECT id, name, description, price, image FROM products WHERE id=:id LIMIT 1";
          $result_products = $conn->prepare($query_products);
          $result_products->bindParam(':id', $id, PDO::FETCH_ASSOC);
          $result_products->execute();
          $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
          extract($row_product);
          $price_rise = ($price*1.5);
          //var_dump($row_product);
    ?>
  <div class="container">
    <h1 class="diplay-4 mt-5 mb-5"><?php echo $name?></h1>
      <div class="row">
        <div class="col-md-6">
          <img src='<?php echo"./img/products/$id/$image";?>' class="card-img-top">
        </div>
        <div class="col-md-6">
          <p>de R$ <?php echo number_format($price_rise,2,",",".");?></p>
          <p>por R$ <?php echo number_format($price,2,",",".");?></p>
          <p>
            <a href="checkout-form.php?id=<?php echo $id; ?>" class="btn btn-primary">COMPRAR</a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-5">
          <?php echo $description; ?>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>