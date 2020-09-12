  <!-- SCRIPTS -->
  <!-- JQuery -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/mdb.min.js"></script>


      <script> 
        new WOW().init();
        // MDB Lightbox Init
        $(function () {
          $("#mdb-lightbox-ui").load("<?php echo BASE_URL; ?>assets/mdb-addons/mdb-lightbox-ui.html");
        });

      </script>    

<?php $random = rand(0,9999) ?>
        <!-- Extra JavaScript -->
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/main.js?v=<? echo $ramdom ?>"></script>

<!-- login -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/login.js?v=<? echo $ramdom ?>"></script>
