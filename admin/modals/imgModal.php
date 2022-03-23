
<!--------------------->
<!------ Modal -------->
<!--------------------->
 <div class="modal fade" id="nuevomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Imagen del Modal Producto :</h5>
                    </div>
                        <div class="modal-body">
                                                         
                          <form action="createModalProducto.php" method="POST" enctype="multipart/form-data">

                          
                         <!-- <div class="form-group">
                             <label for="categoria" class="form-label">Producto a Vincular :</label> 
                                        <select name="id_modal" id="id_modal" class="form-control" value="<?php echo $productos; ?>">
                                            <option value=" ">Selecionar El Producto</option>
                                            <?php while ($productosx = mysqli_fetch_assoc($prod_modal)):?> 
                                               <option <?php echo $productos === $productosx['id'] ? 'selected': '' ;?> value="<?php echo $productosx['id'];?>"><?php  echo $productosx['nombre'];?></option>
                                            <?php  endwhile;?>
                                        </select>
                         </div> -->

                         <div class="form-group">
                             <div class="col col-md-12">
                                <label for="precio">Nombre :</label>
                                    <input type="text" class="form-control w-100" id="nombre_modal" name="nombre_modal" placeholder="Nombre" required>
                                </div>
                                                           
                         </div>
                    
                         <hr>


                         <div class="form-group">
                            <div class="row">
                                <div class="form-group">
                                <label for="logo_data">Imagen del Modal :</label>
                                    <input type="file" style="border: none;" class="form-control border-0" id="img_modal" name="img_modal" placeholder="" accept="image/jpeg, image/png, image/webp">
                                </div>
                            </div>

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
                     
                     
                     
                     
                     
        