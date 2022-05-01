<?php
include 'includeweb/header.php';
?>

    
<section class="content"><!-- Main content -->
        

<!-- --============================-- --------->
<!---------- Inicio Prmosiones ---------------->
<!-- --============================-- --------->



<section class="blogs" id="blogs">

        <div class="heading">
            <h3>Promosiones del Dia</h3>
        </div>

        <div class="box-container">

            <div class="box" data-aos="fade-up" data-aos-delay="150">
                <div class="image">
                    <img src="images/cards/MIXTA_PRO.webp" alt="pepito" class="img_menu" type="image/webp">
                    <div class="icons">
                        <p class="titulo_promo">Mixta </p>
                        <p class="text_promo">Esta delicia lleva doble carne, tocino, Queso Shedder </p>
                    </div>
                </div>
                <div class="content">
                    <h3>hamburguesa mixta</h3>
                </div>
            </div>



            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="images/cards/CLUBHOUSE_PRO.webp" alt="pepito" class="img_menu" type="image/webp">
                    <div class="icons">
                        <p class="titulo_promo">Club House </p>
                        <p class="text_promo">Sandwich al estilo Americano, acompañado con papas y salsa</p>
                    </div>
                </div>
                <div class="content">
                    <h3>clubhouse</h3>
                </div>
            </div>

          

            <div class="box" data-aos="fade-up" data-aos-delay="450">
                <div class="image">
                    <img src="images/cards/PROBRE_PRO.webp" alt="pepito" class="img_menu" type="image/webp">
                    <div class="icons">
                        <p class="titulo_promo">A lo Probre </p>
                        <p class="text_promo">Tradición chilena, papa, huevo, doble carne</p>
                    </div>
                </div>
                <div class="content">
                    <h3>A lo pobre</h3>
                </div>
            </div>

        </div>

</section>



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