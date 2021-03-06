
<?php 

//-------------------------------------------------------------//
//-----------------  Modal UpdateUser.php  --------------------//
//-------------------------------------------------------------//


//SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:

$tipo = "SELECT * FROM tipo_producto";
$resul_tipo = mysqli_query($db, $tipo);

/* echo "<pre>";
var_dump($productos);
echo "</pre>";  */

//SENTENCIA SQL CONSULTAR REGISTROS IMAGEN_MODAL:
$modals = "SELECT *FROM modal_producto";
$resul_modal = mysqli_query($db, $modals);
?>
<!------------------->
<!----- Modal ------->
<!------------------->
<div class="modal fade" id="updateproducto<?php echo $productos['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
   
      <form action="addUpdateProd.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="row">
                                  <div class="col col-6">
                                      <div class="form-group">
                                          <label for="nombre">Nombre :</label>
                                              <input type="hidden" class="form-control" name="id" value="<?= $productos ['id'];?>"> 
                                                  <input type="hidden" class="form-control" name="estado_id" value="<?= $productos ['estado_id'];?>"> 
                                                  <input type="hidden" class="form-control" name="creado" value="<?= $productos ['creado'];?>"> 
                                              <input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" value="<?= $productos ['nombre'];?>">                                
                                      </div> 
                                  </div>
          
                                  <div class="form-group">
                                      <div class="col col-md-6">
                                          <label for="precio">Precio :</label>
                                              <input type="number" class="form-control w-100" id="precio" name="precio" placeholder="precio" value="<?= $productos ['precio'];?>">
                                          </div>
                                                                    
                                </div>
                          </div>

                            
  
                           <div class="form-group">
                           <label for="categoria" class="form-label">Categoria :</label>

                                          <select name="tipo_id" id="tipo_id" class="form-control" value="<?php echo $productos['tipo_nombre'];?>">
                                              <option value="<?php echo $productos['tipo_id'];?> "><?php echo $productos['tipo_nombre'];?></option>
                                                   <?php while ($tipopro = mysqli_fetch_assoc($resul_tipo)):?> 
                                                 <option <?php echo $tipo === $tipopro['id'] ? 'selected': '' ;?> value="<?php echo $tipopro['id'];?>"><?php  echo $tipopro['tipo_nombre'];?></option>
                                              <?php  endwhile;?>
                                          </select>

                            </div>
  
                           <div class="form-group">
                               <div class="row d-flex align-items-center">
                                   <div class="col col-sm-4">
                                   <label for="ingredientes">Ingredientes :</label>
                                   </div>
  
                                   <div class="col col-sm-8">
                                     <textarea class="form-control"  id="ingredientes" name="ingredientes" placeholder="ingredientes del producto" cols="40"><?= $productos ['ingredientes'];?></textarea>
                                   </div>
                               </div>
                                                             
                           </div>
  
                           <hr>
  
                         <div class="form-group">
                           <div class="row d-flex align-items-center">
                               <div class="col col-8">
                               <label for="logo_data">Imagen :</label>
                                  <input type="file" style="border: none;" class="form-control border-0" id="small_img" name="small_img" placeholder="" accept="image/jpeg, image/png, image/webp">
                               </div>

                               <div class="col col-4">
                                   <img class="imgsmalll" src="uploads/product/<?php echo $productos['small_img']; ?>" height="55px" width="55px">
                               </div>
                           </div>
                         </div>
                         <hr>

                         <div class="form-group">
                              <label for="categoria" class="form-label">Imagen Modal:</label>
                                        <select name="modal_img_id" id="modal_img_id" class="form-control" value="<?php echo $productos['nombre_modal'];?>">
                                      
                                            <option value="<?php echo $productos['id_modal'];?>"><?php echo $productos['nombre_modal'];?></option>
                                            <?php while ($modal = mysqli_fetch_assoc($resul_modal)):?> 
                                               <option <?php echo $modals === $modal['id_modal'] ? 'selected': '' ;?> value="<?php echo $modal['id_modal'];?>"><?php  echo $modal['nombre_modal'];?></option>
                                            <?php  endwhile;?>
                                          
                                        </select>
                         </div>

  
        
      
                            <div class="modal-footer">
                                <a href=""><button type="submit" class="btn btn-success">Registrar</button></a>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>


        </form>

      </div>

    </div>
  </div>
</div>