

<!-- SESION DE FOOTER -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Desarrollo > </b><a class="text-danger" href="#">MAYTech</a>     
    </div>
    <strong>Panel Administrativo - Sitio Web <a href="https://adminlte.io">INMOBILIARIA</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<script src="./plugins/sweetalert2/sweetalert2.all.min.js" ></script>

<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- Alert de regsitro exitoso-->
<?php if ( intval($registro) === 1): ?>

<script>
  Swal.fire({
  icon: 'success',
  title: 'Excelente...!',
  text: 'Registro Efectuado con exito',

    })
</script>


<?php elseif ( intval($registro) === 2): ?>

<script>
  Swal.fire({
  icon: 'success',
  title: 'Excelente...!',
  text: 'Registro Actualizado con exito',
 
  })

</script>



<?php elseif ( intval($registro) === 3): ?>
  
<script>
 Swal.fire({
  title: 'Registro Eliminado',
  text: "Proceso inreversible",
  icon: 'warning',
 
})
</script>

<?php endif;?>

<!-- Paginacion de Datatable-->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       
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

        }
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
      


});
   

  });
 </script>


</body>
</html>