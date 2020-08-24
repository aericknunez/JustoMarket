<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_GET["modal"])) include_once 'system/modal/modal.php';

elseif(isset($_GET["user"])) include_once 'system/user/user.php';

elseif(isset($_GET["categoria"])) include_once 'system/categorias/index.php';

elseif(isset($_GET["detalle"])) include_once 'system/detalles/index.php';

elseif(isset($_GET["promociones"])) include_once 'system/promociones/index.php';

elseif(isset($_GET["contacto"])) include_once 'system/contacto/index.php';

elseif(isset($_GET["cart"])) include_once 'system/checkout/index.php';

elseif(isset($_GET["checkout"])) include_once 'system/checkout/checkout.php';

elseif(isset($_GET["perfil"])) include_once 'system/user/index.php';

else{

	include_once 'system/index/index.php';

} // else
	
?>