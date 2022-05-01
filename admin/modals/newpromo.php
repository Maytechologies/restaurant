 

<!------------------------------------------>
<!---------- Modal NewPromo.php ------------>
<!------------------------------------------>

<div class="modal fade" id="nuevapromo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-success">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Registro de Promosión</h5>
                    </div>
                        <div class="modal-body">
                        
                          <form action="createPromo.php" method="POST" enctype="multipart/form-data">
                            
                          <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                    <input type="hidden" name="user" value="<?php echo $_SESSION['user'] ?>">
                                                    <input type="text" class="form-control" name="name" placeholder="Nombre de la Promosión" required="">                                
                                            </div> 
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                    <label for="precio">Descripción Corta :</label>
                                                    <input type="mail" class="form-control w-100" id="description" name="description" placeholder="Agrega descripción" required="">
                                            </div>                               
                                        </div>
                          </div>

                         <hr>

                         <div class="row">
                             <div class="form-group">
                             <label for="logo_data">Flyer de la Promosión:</label>
                                <input type="file" style="border: none;" class="form-control border-0" id="photo" name="photo" placeholder="" accept="image/jpeg, image/png, image/webp" required="">
                             </div>
                         </div>

                         <hr>



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