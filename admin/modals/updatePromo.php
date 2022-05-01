
<!-- 
//-------------------------------------------------------------//
//-----------------  Modal UpdatePromo.php  --------------------//
//-------------------------------------------------------------// -->



<div class="modal fade" id="update<?php echo $promos['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-warning">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Editar Promosión</h5>
                    </div>
                    <img class="card-img-top w-100"  style="height: 300px;" src="uploads/Promo/<?php echo $promos['photo']; ?>">
                        <div class="modal-body">                         
                          <form action="addUpdatePromo.php" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                                        <div class="col col-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                <input type="hidden" name="id" value="<?php echo $promos['id'];?>">
                                                <input type="hidden" name="user" value="<?php echo $_SESSION['user'] ?>">
                                                <input type="hidden" name="publisher" value="<?php echo $promos['publisher']; ?>">
                                                <input type="text" class="form-control" name="name" value="<?php echo $promos['name']; ?>">                                
                                            </div> 
                                        </div>
                                        <div class="col col-12">
                                            <div class="form-group">
                                                    <label for="precio">Descripción :</label>
                                                    <input type="mail" class="form-control w-100" id="description" name="description" value="<?php echo $promos['description']; ?>">
                                            </div>
                                                                        
                                        </div>

                           </div>
                         <hr>
                         <div class="row">
                             <div class="form-group">
                             <label for="logo_data"> Flyer de Promosión:</label>
                                <input type="file" style="border: none;" class="form-control border-0" id="photo" name="photo" placeholder="" accept="image/jpeg, image/png, image/webp">
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
