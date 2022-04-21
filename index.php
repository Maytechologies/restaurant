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
      <i class="fas fa-shipping-fast"></i>
        <h3>Delivery</h3>
      <p>+56 942589675</p>
   </div>

   <div class="box" data-aos="fade-up" data-aos-delay="450">
      <i class="fas fa-headset"></i>
         <h3>Contacto</h3>
        <p><a style="color: rgb(15, 233, 7);" href="https://api.whatsapp.com/send?phone=56942589675&text=hola..%20los%20contacto%20por%20medio%20de%20su%20web">WhatsApp</a></p>
      <p><a style="color:seashell"  href="#contact">LandinPages</a></p>
   </div>

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

   <div class="row">

     <div class="mapa">
      <iframe data-aos="fade-up" data-aos-delay="150" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.605250074494!2d-71.26526378519152!3d-29.93326468192287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691ca49dae90043%3A0x9de68ed50f78c77a!2sIsla%20Tenglo%203573%2C%20La%20Serena%2C%20Coquimbo!5e0!3m2!1ses-419!2scl!4v1643158974594!5m2!1ses-419!2scl" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </div>
      <div class="form">

         <div class="icons-container">

           <div class="icons" data-aos="fade-up" data-aos-delay="150">
               <i class="fas fa-map"></i>
               <h3>Dirección :</h3>
               <p>Isla tenglo 3573, Sector Cuatro Esquina, la serena</p>
            </div>

            <!-- <div class="icons" data-aos="fade-up" data-aos-delay="300">
               <i class="fas fa-envelope"></i>
               <h3>email :</h3>
               <p>correo_ventas@gmail.com</p>
               <p>pepitoburguer@gmail.com</p>
            </div> -->

            <div class="icons" data-aos="fade-up" data-aos-delay="450">
               <i class="fas fa-phone"></i>
               <h3>Teléfonos :</h3>
               <p>+56 942589675</p>
               
            </div> 
            
         </div>

         <form action="emailSend.php" method="POST">
            <input data-aos="fade-up" name="nombre" data-aos-delay="150" type="text" placeholder="Nombre Completo" class="box" required="">
            <input data-aos="fade-up" name="email" data-aos-delay="300" type="email" placeholder="email" class="box">
            <input data-aos="fade-up" name="telefono" data-aos-delay="450" type="number" placeholder="Telefono" class="box">
           
              
              <select data-aos="fade-up" name="asunto" data-aos-delay="450" type="text" class="box">
                <option value="Reservaciónnn" class="box">Reservación</option>
                <option value="Observación" class="box">Observación</option>
                <option data-aos="fade-up" data-aos-delay="450" type="text" class="box">Recomendación</option>
                <option data-aos="fade-up" data-aos-delay="450" type="text" class="box">Otro Motivo</option>
              </select>
            
           <!--  <input data-aos="fade-up" name="asunto" data-aos-delay="450" type="text" placeholder="Motivo" class="box"> -->
            <textarea data-aos="fade-up" name="mensaje" data-aos-delay="600" placeholder="mensaje" class="box" id="" cols="30" rows="10"></textarea>
            <input data-aos="fade-up" data-aos-delay="750" type="submit" value="enviar" class="btn">
         </form>

      </div>

   </div>

</section>

<!-- final sesion de contacto -->
<section class="blogs" id="blogs">

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