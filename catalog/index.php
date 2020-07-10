<?php 
require_once 'catalog/head.php'
 ?>

<body>

<?php 
    
    require_once 'catalog/menu.php'; 

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
//


    require_once 'catalog/query.php';
 ?>

</body>

</html>