<?php
include 'includeweb/header.php';
?>

<!-- numero : 4120 0302 9651 0856   
expira : 08/28 
cv:292   -->
        

<!-----============================------------>
<!---------- Inicio Prmosiones ---------------->
<!-----============================------------>


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
        
<div class="container mt-3 w-80">

<div class="row text-center text-uppercase text-white my-5">
    <div class="col-12">
      <div class="heading text-uppercase">
          <h3>la carta</h3>
      </div>
    </div>
</div>
  

<div class="row">

<?php while ($productos = mysqli_fetch_assoc($tables3Query)): ?>
                  
            <!-- /.col -->
            <div class="card_producto col-md-3 col-sm-6 col-12 mb-2" data-toggle="modal" data-target="#modal<?php echo $productos['id']; ?>">
            <div class="info-box shadow d-flex align-items-center">
                <div class="col-30">
                    <span class="info-box-icon"><img style="height: 80px; width: 80px;" src="/admin/uploads/product/<?php echo $productos['small_img']; ?>" alt=""></span>
                </div>
                <input type="hidden" >
                <div class="col-65 mx-5">
                    <p class=" nombre_pro my-1 text-uppercase"><?php echo $productos['nombre']; ?></p>
                    <p class="precio_pro"> <span>$ <?php echo number_format($productos['precio'], 2, ',', '.'); ?></p>
                </div>
            </div>  <!-- /.info-box -->
            </div><!-- /.col -->

            <?php include 'modalCarta.php' ?>

<?php endwhile; ?>

</div> <!-- Final Session Row -->
    
    
   
  </div> <!-- /container-->
         
</section> <!-- Final etiqueta Session -->


<?php
include 'includeweb/footer.php';
?>