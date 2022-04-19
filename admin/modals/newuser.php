 <!------------------------------------->
<!---------- Modal NewUser ------------>
<!------------------------------------->
 
 <style>
    
    .radio{
        position: relative;
        justify-content: center;
        height: 45px;
        display: inline-flex;
        overflow: hidden;
       
        
    }

    .radio__input{
        display: none;
    }

    .radio__label{
       padding: 10px 14px;
        font-size: 10px;
        font-family: sans-serif;
        color: #000;
        background: #ccc;
        cursor:pointer;
        transition: background 0.1s;
        border-radius: 10%;
    }

    .radio__label:not(last-of-type){
        border-right: 1px solid #006856;
    }

    .radio__input:checked + .radio__label{
        background: #006856;
        font-size: 12px;
        color: #fff;
    }

 </style>

<div class="modal fade" id="nuevousuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-success">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Registro de Usuario</h5>
                    </div>
                        <div class="modal-body">

                          
                          <form action="createUser.php" method="POST" enctype="multipart/form-data">
                            
                          <div class="row">
                                        <div class="col col-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                    <input type="text" class="form-control" name="user_name" placeholder="Nombre del usuario" required="">                                
                                            </div> 
                                        </div>
                                        <div class="col col-6">
                                            <div class="form-group">
                                                    <label for="precio">email :</label>
                                                    <input type="mail" class="form-control w-100" id="email" name="email" placeholder="Insertar email" required="">
                                            </div>
                                                                        
                                        </div>

                                        <div class="col col-6">
                                            <div class="form-group">
                                            
                                                    <label for="precio">Password :</label>
                                                    <input type="password" class="form-control w-100" id="password" name="password" placeholder="Insertar password" required="">
                                            </div>
                                                                        
                                        </div>

                                <div class="col col-6">
                                    <div class="form-group">
                                          <label for="categoria" class="form-label">Perfil :</label>
                                                    <select name="tipo_id" id="tipo_id" class="form-control" value="<?php echo $tipou; ?>" required="">

                                                            <option value=" ">Selecionar una opcion</option>
                                                            <?php while ($tipousers = mysqli_fetch_assoc($resul_tipou)):?> 
                                                            <option <?php echo $tipou === $tipousers['id'] ? 'selected': '' ;?> value="<?php echo $tipousers['id'];?>"><?php  echo $tipousers['name_tip_user'];?></option>
                                                            <?php  endwhile;?>
                                                    
                                                    </select>
                                        </div>
                                </div>


                          </div>

                        
                           <div class="radio">


                           
                               <div class="form-group">
                               <label class="mr-2"> Estado del Usuario :</label>
                               <input class="radio__input" type="radio"  value="1" name="tipo_id" id="tipo_id1">
                               <label class="radio__label" for="tipo_id1">Activo</label>

                               <input class="radio__input bg-danger" type="radio"  value="2" name="tipo_id" id="tipo_id2">
                               <label class="radio__label" for="tipo_id2">Inactivo</label>

                               </div>
                               
                           </div>
                                 
                                
                       

                         <hr>

                         <div class="row">
                             <div class="form-group">
                             <label for="logo_data"> Foto de Usuario:</label>
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