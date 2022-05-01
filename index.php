<!-------------------------------------------------------
-------------------PAGINA WEB PRINCIPAL------------------
--------------------------------------------------------->

<?php
include 'includeweb/header.php';
?>


<!-- sessión Inicio   -->

<section class="home" id="home">

   <div class="content">
      <img data-aos="fade-up" data-aos-delay="150" src="images/cards/img_banner1.png" alt="">
      <h3 data-aos="fade-up" data-aos-delay="300">Una locura de sabor</h3>
      <p data-aos="fade-up" data-aos-delay="450">Descripción detalla del producto principal del menu del dia, la semana o promoción actual</p>
      <a data-aos="fade-up" data-aos-delay="600" href="menu.html" class="btn">Carta</a>
   </div>

</section>

<!-- final sesion de inicio -->

<!-- Inicio de Servicios  -->

<section class="service">

   <div class="box" data-aos="fade-up" data-aos-delay="150">
      <i class="fas fa-hamburger"></i>
        <h3>Buena Calidad</h3>
      <p>Proceso de selección de productos en diferentes lugares para lograr un sorprendente producto</p>
   </div>

   <div class="box" data-aos="fade-up" data-aos-delay="300">
    <a href="https://wa.link/eexkws" target="_blank"><i class="wha fa-brands fa-whatsapp"></a></i>
      <a href="https://wa.link/eexkws" target="_blank"><h5 class="chat">Chat Por</h5></a>
        <h3><a href="https://wa.link/eexkws" target="_blank" class="textwha">Whatsapp</h3></a>
   </div>

   <div class="box" data-aos="fade-up" data-aos-delay="300">
      <i class="fas fa-shipping-fast"></i>
        <h3>Delivery</h3>
      <p>+56 942589675</p>
   </div>

   
   
   <style>
     .wha{
       font-size:75px !important;
        color: #25d366!important;
        background: transparent !important; 
        cursor: pointer; 
     }
     .textwha{
        text-decoration: none;
        color: #fff !important;
     }
     .chat{
        color: #fff;
        font-weight:400;
        font-size: 14px;
     }
   </style>

</section>

<!-- Final session de servicios -->

<!-- Inicio sesión de Menú  -->

<section class="menu" id="menu">

   <div class="heading">
      <!-- <img src="images/title-img.png" alt=""> -->
      <h3>Menú</h3>
   </div>


 

   <div class="box-container"><!-- Container principal del menu -->

         <?php while ($productos = mysqli_fetch_assoc($tables3Query)): ?>

            <div class="box" data-aos="fade-up" data-aos-delay="150">

            <img src="/admin/uploads/product/<?php echo $productos['small_img']; ?>">
               <div class="content">
                  <h3 class="titulo"><?php echo $productos['nombre']; ?></h3>
                  <div class="price">$ <?php echo number_format($productos['precio'], 2, ',', '.'); ?></div>
               </div>
            </div><!--End Container-->
            
            <?php endwhile; ?>
            
   </div>

</section>

<!-- Final session de menu-->




<!-- about section starts  -->

<section class="about" id="about">

   <div class="image" data-aos="fade-right" data-aos-delay="150">
      <img src="images/edit/MIXTA.png" alt="">
   </div>

   <div class="content" data-aos="fade-left" data-aos-delay="300">
      <h3 class="title">Porque nos prefieren..!</h3>
      <br>
      <!-- <p>Descripción detallada de la promosión de la semana, dia, mes Descripción detallada de la promosión de la semana, dia, mes Descripción detallada de la promosión de la semana, dia, mes</p> -->
      <div class="icons">
         <h3> <i class="fas fa-check"></i> Mejor Precio </h3>
         <h3> <i class="fas fa-check"></i> Servicio Insuperable </h3>
         <h3> <i class="fas fa-check"></i> Ingredientes Frescos </h3>
         <h3> <i class="fas fa-check"></i> Mejores Picaditas </h3>
         <h3> <i class="fas fa-check"></i> Quesos Naturales </h3>
         <h3> <i class="fas fa-check"></i> Atención Esmerada</h3>
      </div>
      <a href="menu.php" class="btn">La Carta</a>
   </div>

</section>

<!-- Final session de nosotros-->


<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="heading">
     <!--  <img src="images/title-img.png" alt=""> -->
      <h3>Contactanos</h3>
   </div>

   <style>
      .map{
         height: 400px;
      }
   </style>

   <div class="row mb-5">
      <div class="col col-md-12 col-sm-12">
         <div class="mapa">
            <iframe data-aos="fade-up" data-aos-delay="150" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.605250074494!2d-71.26526378519152!3d-29.93326468192287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691ca49dae90043%3A0x9de68ed50f78c77a!2sIsla%20Tenglo%203573%2C%20La%20Serena%2C%20Coquimbo!5e0!3m2!1ses-419!2scl!4v1643158974594!5m2!1ses-419!2scl"allowfullscreen="" loading="lazy"></iframe>
         </div>
      </div> 
   </div>

<div class="row">
   <div class="col">
      <div class="form">

         <div class="icons-container my-5">
              <div class="row mx-auto">
                 <div class="col-col-md-6">
                     <div class="icons" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-map"></i>
                        <h3>Dirección :</h3>
                        <p> Sector Cuatro Esquina, la serena</p>
                        <p>Isla tenglo 3573,</p>
                     </div>
                  </div>

               
                  <div class="col-col-md-6">
                     <div class="icons" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-phone"></i>
                          <h3>Teléfonos :</h3>
                            <p>+56 942589675</p>
                        
                     </div> 
                  </div>    
              </div>     
       </div>

      <div class="row justify-content-md-center">
         <div class="col col-md-8">
            <h2 class="heading text-white mt-5">Formulario de Contacto</h2>
               <form action="emailSend.php" method="POST">
                     <input data-aos="fade-up" name="nombre" data-aos-delay="150" type="text" placeholder="Nombre Completo" class="box" required="">
                     <input data-aos="fade-up" name="email" data-aos-delay="300" type="email" placeholder="email" class="box">
                     <input data-aos="fade-up" name="telefono" data-aos-delay="450" type="number" placeholder="Telefono" class="box">
                  
                     
                     <select data-aos="fade-up" name="asunto" data-aos-delay="450" type="text" class="box">
                        <option value="Reservaciónnn" class="box bg-black">Reservación</option>
                        <option value="Observación" class="box bg-black">Observación</option>
                        <option value="Recomendacion" class="box bg-black">Recomendación</option>
                        <option value="Otro" class="box bg-black">Otro Motivo</option>
                     </select>
                     
                  <!--  <input data-aos="fade-up" name="asunto" data-aos-delay="450" type="text" placeholder="Motivo" class="box"> -->
                     <textarea data-aos="fade-up" name="mensaje" data-aos-delay="600" placeholder="mensaje" class="box" id="" cols="30" rows="10"></textarea>
                     <input data-aos="fade-up" data-aos-delay="750" type="submit" value="enviar" class="btn">
               </form>
         </div>
      </div>
    </div> <!-- Final Formulario -->
   </div><!--  Final Columna -->
</div><!-- Final Row -->

</section>

<!-- final sesion de contacto -->
<section class="blogs my-5" id="blogs">

   <div class="heading">
       <h3>Promociones del Día</h3>
   </div>

   <div class="box-container">

       <div class="box" data-aos="fade-up" data-aos-delay="150">
           <div class="image">
               <img src="images/cards/MIXTA_PRO.jpg" alt="">
               <div class="icons">
                   <p class="titulo_promo">Mixta </p>
                   <p class="text_promo">Esta delicia lleva doble carne, tocino, Queso Sheder </p>
               </div>
           </div>
           <div class="content">
               <h3>hamburguesa mixta</h3>
              <!--  <p>Descripción de algunos ingredientes y recomendaciones para un tipo de paladar</p> -->
               <!--  <a href="#" class="btn">read more</a> -->
           </div>
       </div>



       <div class="box" data-aos="fade-up" data-aos-delay="300">
           <div class="image">
               <img src="images/cards/CLUBHOUSE_PRO.jpg" alt="">
               <div class="icons">
                   <p class="titulo_promo">Club House </p>
                   <p class="text_promo">Sandwich al estilo Americano, acompañado con papas y salsa</p>
               </div>
           </div>
           <div class="content">
               <h3>clubhouse</h3>
              <!--  <p>Descripción de algunos ingredientes y recomendaciones para un tipo de paladar</p> -->
               <!--  <a href="#" class="btn">read more</a> -->
           </div>
       </div>

     

       <div class="box" data-aos="fade-up" data-aos-delay="450">
           <div class="image">
               <img src="images/cards/PROBRE_PRO.jpg" alt="">
               <div class="icons">
                   <p class="titulo_promo">A lo Probre </p>
                   <p class="text_promo">Tradicion chilena, papa, huevo, doble carne</p>
               </div>
           </div>
           <div class="content">
               <h3>A lo pobre</h3>
               <!-- <p>Descripción de algunos ingredientes y recomendaciones para un tipo de paladar</p> -->
               <!--  <a href="#" class="btn">read more</a> -->
           </div>
       </div>

   </div>

</section>

<!-- Final Prmosiones -->

<!-- Inicio del Footer  -->

<?php
include 'includeweb/footer.php';
?>