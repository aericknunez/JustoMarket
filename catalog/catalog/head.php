<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>JustoMarket</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo BASE_URL; ?>assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->

    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">

<?php 
if(isset($_GET["cart"])) {
echo '<link href="' . BASE_URL . 'assets/css/cart.css" rel="stylesheet">';
} 
if(isset($_GET["perfil"])) {
echo '    <link href="' . BASE_URL . 'assets/css/dash-mdb.min.css" rel="stylesheet">';
} 
?>

</head>