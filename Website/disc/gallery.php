
<!DOCTYPE html>
<html lang="en" dir="ltr">
 

  <?php include "./head.php" ?>
  <body>
  <?php include ("./header.php"); ?>
    <div class="gallery-section">
      <div class="inner-width">
        <h1>Gallery</h1>
        <div class="border"></div>
        <div class="gallery">

          <a href="/ProjectBike/images/gallery1.jpg" class="image">
            <img src="/ProjectBike/images/gallery1_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery2.jpg" class="image">
            <img src="/ProjectBike/images/gallery2_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery3.jpg" class="image">
            <img src="/ProjectBike/images/gallery3_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery4.jpg" class="image">
            <img src="/ProjectBike/images/gallery4_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery5.jpg" class="image">
            <img src="/ProjectBike/images/gallery5_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery6.jpg" class="image">
            <img src="/ProjectBike/images/gallery6_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery7.jpg" class="image">
            <img src="/ProjectBike/images/gallery7_tn.jpg" alt="">
          </a>

          <a href="/ProjectBike/images/gallery8.jpg" class="image">
            <img src="/ProjectBike/images/gallery8_tn.jpg" alt="">
          </a>

        </div>
      </div>
    </div>

<?php include "./footer.php" ?>
  <script>
    $(".gallery").magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery:{
        enabled: true
      }
    });
  </script>

  </body>
</html>
