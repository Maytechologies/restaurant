<?php
include 'includeweb/header.php';
?>

<!-- --============================-- --------->
<!---------- Inicio Prmosiones ---------------->
<!-- --============================-- --------->



<section class="blogs" id="blogs">
        <div class="heading">
            <h3>Promosiones del Dia</h3>
              </div>
                <div class="box-container">
                  <?php while ($item = mysqli_fetch_assoc($QueryPromo)): ?>
                    <div class="box" data-aos="fade-up" data-aos-delay="150">
                        <div class="image">
                            <img src="admin/uploads/Promo/<?php echo $item['photo'];?>" alt="promosion" class="img_menu" type="image/webp">
                               <div class="icons">
                             <p class="titulo_promo"><?php echo $item['name'];?></p>
                          <p class="text_promo"><?php echo $item['description'];?></p>
                        </div>
                     </div>
                  <div class="content">
               <h3><?php echo $item['name'];?></h3>
            </div>
        </div>
     <?php endwhile ?> 
  </div> <!-- Box Container -->
</section> <!-- Final Section -->



<!---------============================--------------------->
<!---------------Inicio Carta de productos ----------------->
<!---------============================--------------------->

  
<section class="content"><!-- Main content -->
    <div class="container-fluid">
        <div class="row">  
            <div class="col-12">
                <div class="heading">
                 <h3>La Carta</h3>
             </div>
            </div>
        </div>
    </div>
<div class="row d-flex justify-content-center">
    <div class="col col-11">
      <table id="example1" class="table table-bordered table-striped table-dark">
            <thead>
               <tr>
                <th>NOMBRE</th>
                    <th class="text-center">IMAGEN</th>
                       <th class="text-center">PRECIO</th>
                          <th class="text-center">DETALLE</th>                                     
                            </tr>
                               </thead>
                                 <tbody>
                                        <?php while ($productos = mysqli_fetch_assoc($tables3Query)): ?>
                    
                                               <tr class="table-group">
                                            
                                                    <td class="text-uppercase mt-2" ><?php echo $productos['nombre']; ?></td>

                                                       <td class="w-2 text-center"><img src="/admin/uploads/product/<?php echo $productos['small_img']; ?>" alt="" height="45px" width="45px"></td>

                                                    <td class="text-uppercase text-center" > $ <?php echo number_format($productos['precio'], 2, ',', '.'); ?></td>
                                               <td class="w-2 text-center">
                                           
                                            <button class="rounded-circle" style="border-radius: 50px; background:#ee8118;" data-toggle="modal" data-target="#modalproducto<?php echo $productos['id']; ?>">Ver</button>                                                                                   
                                        </td>
                                    </tr>
                                 <?php include 'modal_producto.php' ?> 
                              <?php endwhile; ?>
                          </tbody>
                        <tfoot>
                     <tr>   
                        <th>Nombre</th>
                           <th>Imagen</th>
                           <th>Precio</th>
                        <th>Detalles</th>       
                    </tr>   
                  </tfoot>
               </table>
            </div>
        </div>              
   <!-- /.row -->
</section>


<?php
include 'includeweb/footer.php';
?>