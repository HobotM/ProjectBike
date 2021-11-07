<!DOCTYPE html>
<html lang="en">


<?php include "./head.php" ?>



<body>
  
  <!-- LOAD COOKIES FROM USERNAME BOX -->



<?php include "./header.php" ?>


    <!-- Hero -->
  
   



    <div class="hero">
        <h1>BIKE KING BORDERS</h1>
          
    </div>
            <div class="cookies">
                <!-- Print welcome message using cookies -->
                <?php if (isLoggedIn()) {
                    echo( "Welcome back, <b>$user</b>!");
                }?> 
            </div>

       
    
    
      
    <div class="hero__container">
    
    </div>
    <section class="testimonials-section">
        <div class="container">
            <ul>
                <li>
                    <img src="/ProjectBike/images/person.jpg" alt="Person">
                    <blockquote>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, odio.</blockquote>
                    <cite>- Jane Doe</cite>
                </li>
                <li>
                    <img src="/ProjectBike/images/person.jpg" alt="Person">
                    <blockquote>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, odio.</blockquote>
                    <cite>- Jane Doe</cite>
                </li>
                <li>
                    <img src="/ProjectBike/images/person.jpg" alt="Person">
                    <blockquote>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, odio.</blockquote>
                    <cite>- Jane Doe</cite>
                </li>
            </ul>
        </div>
    </section>


    <!-- Hero end -->


    <?php include "./footer.php" ?>
    
    
</body>

</html>