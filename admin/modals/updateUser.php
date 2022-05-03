<?php

//-------------------------------------------------------------//
//-----------------  Modal UpdateUser.php  --------------------//
//-------------------------------------------------------------//

$tipou = "SELECT * FROM tipo_usuario";
$resul_tipou = mysqli_query($db, $tipou); // este query lo aplicamos en la etiqueta select del formulario de registro

/* echo "<pre>";
            var_dump($usuarios);
               echo "</pre>";  
                   exit;  */

?>
<!---------------------------------------->
<!---------- Modal UpdateUser ------------>
<!---------------------------------------->
<div class="modal fade" id="updateUser<?php echo $usuarios['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-warning">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Editar Registro de Usuario</h5>
                    </div>
                        <div class="modal-body">                         
                          <form action="addUpdateUser.php" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                                        <div class="col col-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                <input type="hidden" name="id" value="<?php echo $usuarios['id'];?>">
                                                <input type="text" class="form-control" name="user_name" value="<?php echo $usuarios['user_name']; ?>">                                
                                            </div> 
                                        </div>
                                        <div class="col col-6">
                                            <div class="form-group">
                                                    <label for="precio">email :</label>
                                                    <input type="mail" class="form-control w-100" id="email" name="email" value="<?php echo $usuarios['email']; ?>">
                                            </div>
                                                                        
                                        </div>

                                        <div class="col col-6">
                                            <div class="form-group">
                                                    <label for="precio">password :</label>
                                                    <input type="password" class="form-control w-100" id="password" name="password" value="<?php echo $usuarios['password']; ?>">
                                            </div>
                                                                        
                                        </div>

                                        
                                <div class="col col-6">
                                    <div class="form-group">
                                          <label for="categoria" class="form-label">Perfil :</label>
                                                    <select name="tipo_id" id="tipo_id" class="form-control" value="<?php echo $usuarios['perfil'];?>">

                                                            <option value="<?php echo $usuarios['tipo_id'] ?>"><?php echo $usuarios['perfil'];?></option>
                                                            <?php while ($tipousers = mysqli_fetch_assoc($resul_tipou)):?> 
                                                            <option <?php echo $usuarios === $tipousers['id'] ? 'selected': '' ;?> value="<?php echo $tipousers['id'];?>"><?php  echo $tipousers['name_tip_user'];?></option>
                                                            <?php  endwhile;?>
                                                            
                                                            
                                                    </select>
                                        </div>
                                </div>
                          </div>
                         <hr>
                         <div class="row">
                             <div class="form-group">
                             <label for="logo_data"> Foto de Usuario:</label>
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
