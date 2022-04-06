 

<!--------------------->
<!------ Modal -------->
<!--------------------->
 <div class="modal fade" id="nuevoproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Ficha del Registro</h5>
                    </div>
                        <div class="modal-body">

                          
                          <form action="createProducto.php" method="POST" enctype="multipart/form-data">
                            
                          <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre :</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" required="">                                
                                    </div> 
                                </div>

                         <div class="form-group">
                             <div class="col col-md-6">
                                <label for="precio">Precio :</label>
                                    <input type="number" class="form-control w-100" id="precio" name="precio" placeholder="precio" required="">
                                </div>
                                                           
                         </div>
                          </div>

                         <div class="form-group">
                         <label for="categoria" class="form-label">Categoria :</label>
                                        <select name="tipo_id" id="tipo_id" class="form-control" value="<?php echo $tipo; ?>" required="">


                                            <option value=" " required="">Selecionar una Categoria</option>
                                            <?php while ($tipores = mysqli_fetch_assoc($resul_tipo)):?> 
                                               <option <?php echo $tipo === $tipores['id'] ? 'selected': '' ;?> value="<?php echo $tipores['id'];?>"><?php  echo $tipores['tipo_nombre'];?></option>
                                            <?php  endwhile;?>
                                          
                                        </select>
                         </div>

                         <div class="form-group">
                             <div class="row d-flex align-items-center">
                                 <div class="col col-sm-4">
                                 <label for="ingredientes">Ingredientes :</label>
                                 </div>

                                 <div class="col col-sm-8">
                                 
                                   <textarea class="form-control" name="ingredientes" id="ingredientes" name="ingredientes" placeholder="ingredientes del producto" cols="40" required=""></textarea>
                                 </div>
                             </div>
                                                           
                         </div>

                         <hr>

                         <div class="row">
                             <div class="form-group">
                             <label for="logo_data">Imagen :</label>
                                <input type="file" style="border: none;" class="form-control border-0" id="small_img" name="small_img" accept="image/jpeg, image/png, image/webp" required="">
                             </div>
                         </div>

                         <hr>

                         <div class="form-group">
                              <label for="categoria" class="form-label">Seleciona Modal :</label>
                                        <select name="modal_img_id" id="modal_img_id" class="form-control" value="<?php echo $modals; ?>" required="">


                                            <option value=" ">Selecionar un Modal</option>
                                            <?php while ($modal = mysqli_fetch_assoc($resul_modal)):?> 
                                               <option <?php echo $modals === $modal['id_modal'] ? 'selected': '' ;?> value="<?php echo $modal['id_modal'];?>"><?php  echo $modal['nombre_modal'];?></option>
                                            <?php  endwhile;?>
                                          
                                        </select>
                         </div>



                         <div class="modal-footer bg-light">
                           <div class="row text-center">
                               <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-success">Registrar</button></a>
                               </div>
                               <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button></a>
                               </div>
                           </div>
                         </div>

                     </form>

                    </div> <!-- END MODAL BODY -->

                </div>

        </div>
 </div><!--  End modal -->