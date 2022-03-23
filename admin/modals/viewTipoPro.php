 
<!--------------------->
<!------ Modal -------->
<!--------------------->
 <div class="modal fade" id="viewItem<?php echo $tipos['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Ficha del Registro</h5>
                    </div>
                        <div class="modal-body">


                                                         
                          <div class="text-center">
                              <img class="card-img-top" src="uploads/type/<?php echo $tipos['tipo_img']; ?>" >
                          </div>
                                                         

                         <div class="form-group">
                             <label for="exampleInputEmail1">N° de Registro</label>
                             <input type="text" class="form-control" id="" aria-describedby="nombre" value="<?php echo $tipos['id']; ?>" disabled>
                                                           
                         </div>

                         <div class="form-group">
                             <label for="exampleInputEmail1">Nombre</label>
                             <input type="text" class="form-control" id="" aria-describedby="nombre" value="<?php echo $tipos['tipo_nombre']; ?>" disabled>
                                                           
                         </div>
                         <div class="modal-footer bg-light">
                             <a href=""><button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button></a>
                         </div>



                        </div>

                </div>

        </div>
 </div><!--  End modal -->