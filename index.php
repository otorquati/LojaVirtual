<?php
include_once './Connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Loja Virtual</title>
</head>
<body>
  <div class="container">
    <h2 class="display-4 mt-5 mb-5">Produtos<h2>
    <?php
      $query_products = "SELECT id, name, price, image FROM products ORDER BY id ASC";
      $result_products = $conn->prepare($query_products);
      $result_products->execute();
    ?>
    <div class="row row-cols-1 row-cols-md-3">
      <?php
        while($row_product = $result_products->fetch(PDO::FETCH_ASSOC)){
          // var_dump($row_product);
          extract($row_product);
          /*echo "<img src='./img/$id/$image'><br>";
          echo "ID: .$id.<br>";
          echo "Nome: $name<br>";
          echo "Preço: ".number_format($price,2,",",".")."<br>";
          echo "<hr>";*/
      ?>
        <div class="col mb-4 text-center">
          <div class="card">
            <img src='<?php echo "./img//products/$id/$image";?>' class="card-img-top" alt="imagem">
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <p class="card-text"><?php echo "Preço: ".number_format($price,2,",",".")."<br>";?></p>
                <a href="view-products.php?id=<?php echo $id; ?>" class="btn btn-primary">Detalhes</a>
              </div>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>