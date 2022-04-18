<!------------------------------------------------>
<!------------- Modal NewTipoUser.php ------------>
<!------------------------------------------------>

<div class="modal fade" id="newTipoPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Categoria</h5>
                          </div>
                              <div class="modal-body">

                          
                                <form action="createTipoPro.php" method="POST" enctype="multipart/form-data">
                                    
                                <div class="row">
                                <div class="col col-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre :</label>
                                        <input type="hidden" name="estado" value="1">
                                            <input type="text" class="form-control" name="tipo_nombre" placeholder="Nombre del usuario" required="">                                
                                                </div> 
                                                    </div>
                                                       </div>

                                                    <div class="row">
                                                      <div class="col col-12">
                                                        <div class="form-group">
                                                    <label for="tipo_img"> Imagen de la Categoria:</label>
                                                <input type="file" style="border: none;" class="form-control border-0" id="tipo_img" name="tipo_img" placeholder="" accept="image/jpeg, image/png, image/webp" required="">
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
                         </div> <!-- End Card Body -->
                    </div> <!-- End Card Content -->
                </div> <!-- End Modal Dialog -->
            </div> <!-- End Modal -->
