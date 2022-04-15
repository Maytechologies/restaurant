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