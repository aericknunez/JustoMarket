<?php 
require_once 'catalog/head.php'
 ?>

<body>
<?php 

 if(isset($_GET["perfil"])){  // mostrar si no es perfil de usuario
      require_once 'catalog/menuPerfil.php'; 
} else {
      require_once 'catalog/menu.php';   
}

/// redirect del contenido
    require_once 'application/src/redirect.php';
// footer
    require_once 'catalog/footer.php';

// modales
    require_once 'catalog/Modal/cart.php';
    require_once 'catalog/Modal/login.php';
    require_once 'catalog/Modal/usuario.php';
    require_once 'catalog/Modal/registro.php';
    require_once 'catalog/Modal/producto.php';
    // require_once 'catalog/Modal/cartsuccess.php';
    require_once 'catalog/Modal/invitado.php';
//


    require_once 'catalog/query.php';

include_once 'application/src/query.php';   
 ?>

</body>

</html>