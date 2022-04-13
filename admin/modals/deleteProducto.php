
<!------------------------------------------------->
<!---------- Modal DeleteProducto.php ------------->
<!------------------------------------------------->


<!-- Modal -->
<div class="modal fade" id="eliminar<?php echo $productos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="text-center modal-header bg-danger shadow-sm p-2 mb-2">
        <h5 class="modal-title" id="exampleModalLabel">¿Confima de Eliminar el Registro..?</h5>
      </div>
      <div class="modal-body">
       
        <form method="POST">

       <div class="row">
        <div class="col col-6">
          <div class="from-group text-center">
               <img class="mb-2 bg-white rounded" src="uploads/product/<?php echo $productos['small_img'];?>" width="150px" height="150px">
          </div>
        </div>

        <div class="col col-6 border-left">
            <div class="from-group">
               <h6 class="font-weight-bold titulo">Nombre :</h6>
                   <input type="hidden"  name="id" id="id" value="<?php echo $productos['id'];?>">
                       <label class="font-weight-light label" for="nombre"><?= $productos['nombre'];?></label>

                      <h6 class="font-weight-bold titulo">Precio :</h6>
                      <label class="font-weight-light" for="nombre"><?= $productos['precio'];?></label>

                   <h6 class="font-weight-bold titulo">Categoria :</h6>
              <label class="font-weight-light" for="nombre"><?= $productos['tipo_nombre'];?></label>
           </div>
         </div>
       </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>