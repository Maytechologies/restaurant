

<!-- Modal -->
<div class="modal fade" id="modalficha<?php echo $productos['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light text-dark">
        <h5 class="modal-title mx-auto" id="staticBackdropLabel">Detalles del Producto</h5>
      </div>
      <div class="modal-body">

      
   
      <form action="addUpdateProd.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="row">
                                  <div class="col">
                                      <div class="form-group">
                                          <label for="nombre">Nombre :</label>
                                              <input type="hidden" class="form-control" name="id" value="<?= $productos ['id'];?>"> 
                                              <input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" value="<?= $productos ['nombre'];?>" disabled>                                
                                      </div> 
                                  </div>
  
                                    

                       
                          </div>

                          

                                   <div class="form-group">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-4 m-0">
                                                <label for="precio">Precio :</label>
                                                    <input type="number" class="form-control " id="precio" name="precio"  value="<?= $productos ['precio'];?>" disabled>
                                          </div>
                                                                        
                                    

                                    
                                            <div class="col-4 m-0">
                                                   <label for="precio">Estado :</label>
                                                    <input type="number" class="form-control" id="estado" name="estado"  value="<?= $productos ['estado'];?>" disabled>
                                            </div>                              
                                    

                                   
                                             <div class="col-4">
                                                 <label for="precio">Registro:</label>
                                                    <input type="text" class="form-control" id="creado" name="creado"  value="<?= $productos ['creado'];?>" disabled>
                                            </div>                              
                                    </div>
                          </div>

                                <?php 
                                //SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:
                                $consultaTipo = "SELECT * FROM tipo_producto";
                                $resul_tipo = mysqli_query($db, $tipo);
                                $tipo = mysqli_fetch_assoc($resul_tipo);

                                //ASIGNAMOS A UNA VARIABLE EL RESUTADO DE TIPO ENTERO:
                                $tipo  = $productos['tipo_id'];
                                ?>

  
                           <div class="form-group">
                           <label for="categoria" class="form-label">Categoria :</label>

                                          <select disabled name="tipo_id" id="tipo_id" class="form-control" value="<?php echo $tipo; ?>">
                                              <option value=" ">Selecionar una Opción</option>
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
                                     <textarea class="form-control"  id="ingredientes" name="ingredientes" disabled placeholder="ingredientes del producto" cols="40"><?= $productos ['ingredientes'];?></textarea>
                                   </div>
                               </div>
                                                             
                           </div>
  
                           <hr>
  
                         <div class="form-group">
                           <div class="row d-flex align-items-center">
                                
                               <div class="col col-6">
                                   <img class="imgsmalll" src="uploads/product/<?php echo $productos['small_img']; ?>" height="60px" width="60px">
                               </div>

                               <div class="col col-6">
                                   <img class="imgsmalll" src="uploads/modals/<?php echo $productos['img_modal']; ?>" height="60px" width="60px">
                               </div>

                           </div>
                         </div>
  
        
      
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>


        </form>

      </div>

    </div>
  </div>
</div>