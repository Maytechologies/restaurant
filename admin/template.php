

<?php

/*  echo"<pre>";
 var_dump($_GET);
 echo "</pre>";

 exit;  */


$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

include 'views/adm_header.php';

?>

<?php
include 'views/adm_menu.php';

?>


<!-- Contenido principal -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
 <div class="container-fluid">
   <div class="row mb-2">
     <div class="col-sm-6">
       <h1>Titulo de Pagina</h1>
     </div>
     <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         
       </ol>
     </div>
   </div>
 </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

 <!-- Default box -->
 <div class="card">
   <div class="card-header">
     <h3 class="card-title">Title</h3>

     <div class="card-tools">
       <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
         <i class="fas fa-minus"></i>
       </button>
       <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
         <i class="fas fa-times"></i>
       </button>
     </div>
   </div>
   <div class="card-body">
     Sesión principal para el crud develope
   </div>
   <!-- /.card-body -->
   <div class="card-footer">
     Footer
   </div>
   <!-- /.card-footer-->
 </div>
 <!-- /.card -->

</section>
<!-- /.content -->
</div>

<?php
include 'views/adm_footer.php';

?>

