


<div class="modal fade" id="modal<?php echo $productos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content modal-dialog-centered">
                
                    <img class="card-img-top w-100" src="/admin/uploads/modals/<?php echo $productos['img_modal']; ?>" alt="Card image cap">
               
                <!-- Cuerpo del Modal -->
                <div class="content_modal container">
                            <div class="modal-body">
                              <div class="form-group d-flex justify-content-between">
                              <h3 class="titulo_producto modal-title"><?php echo $productos['nombre'];?></h3>
                              <h3 class="modal-title text-dark" style="font-size: 20px;"> $ <?php echo number_format($productos['precio'], 2, ',', '.'); ?></h3>
                              </div>
                                <hr>
                                   <h4 class="text_ingrediente" style="font-weight: 700; color:brown;">Ingredientes  :</h4>
                                  
                                   <div class="from-group">
                                       <div class="col ml-0">
                                           <p style="color: black; font-size: 12px; "><?php echo $productos['ingredientes'];?></p>
                                       </div>  
                                   </div>
                            </div>
                         </div>
                     <!-- Modal footer -->
                
                
                     <div class="modal-footer d-flex justify-content-center">
                           <div class="row">
                               <div class="col-12">
                                  <button type="submit" 
                                   class="botonModal"  data-dismiss="modal">Cerrar</button>
                               </div>
                           </div>
                         </div>
              </div>
            </div>
          </div>