<!-- --------------------------------------------------------
-------------------FOOTER WEB SITE----------------------
--------------------------------------------------------- -->

<section class="footer">

   <div class="links">
      <a href="index.php" class="btn">Inicio</a>
      <a href="menu.php" class="btn">Menú</a>
      <a href="nosotros.php" class="btn">Nosotros</a>
      <a href="admin/index.php" class="btn">sistema</a>
   </div>

   <p class="credit"> Diseño - Adaptación | <a style="text-decoration: none;" href="https://maytechologies.github.io/web_maytech/index.html"><span>MAYTech Soluciones</span> </a>| Desarrollo - Backend </p>

</section>

<!-- Final del Footer -->


<!-- custom js file link      -->
<script src="js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

AOS.init({
   duration: 800,
});

</script>

<!-- SCRIP AVANZADOS DE DATATABLE Y OTROS PLUGINGS -->
<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../admin/bootstrap/js/bootstrap.js"></script>
<script src="../admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<script src="../admin/plugins/sweetalert2/sweetalert2.all.min.js" ></script>

<!-- DataTables  & Plugins -->
<!-- <script src="../plugings/datatables/datatables.min.js"></script> -->
<script src="../plugings/datatables/Bootstrap-4-4.6.0/js/bootstrap.min.js"></script>
<script src="../plugings/datatables/DataTables-1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugings/datatables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
<script src="../plugings/datatables/SearchPanes-2.0.0/js/searchPanes.bootstrap4.min.js"></script>
<script src="../plugings/datatables/SearchPanes-2.0.0/js/dataTables.searchPanes.js"></script>
<script src="../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>


<!-- Paginacion de Datatable-->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "lengthMenu": [20, 40, 60, 80, 100], "pageLength": 20,
      
      
       
      "language": {

        "sProcessing":     "Procesando...",

        "sLengthMenu":     "Mostrar _MENU_ registros",

        "sZeroRecords":    "No se encontraron resultados",

        "sEmptyTable":     "Ningún dato disponible en esta tabla",

        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

        "sInfoPostFix":    "",

        "sSearch":         "Buscar:",

        "sUrl":            "",

        "sInfoThousands":  ",",

        "sLoadingRecords": "Cargando...",

        "oPaginate": {

        "sFirst":    "Primero",

        "sLast":     "Último",

        "sNext":     "Siguiente",

        "sPrevious": "Anterior"

        },

        "oAria": {

        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

        "sSortDescending": ": Activar para ordenar la columna de manera descendente"

        },
        
        }







    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": true
      


});


  });

 </script>
    
</body>
</html>