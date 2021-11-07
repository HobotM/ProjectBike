<!DOCTYPE html>
<html lang="en">

<?php include "./head.php" ?>

<body>



<?php include "./header.php" ?>
<?php if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    } else {?>
<div class="offers-container">
<!-- foreach offer -->
<?php
						$stmt = "SELECT offer_id, offer_name, offer_description, offer_price FROM offers";
						$result1 = $db ->query($stmt);
						if ($result1-> num_rows >0):
							while($row = $result1 -> fetch_assoc()):
								?>
                      <div class="box" id="box_<?php echo $row['offer_id'] ?>">
                        <div class="content">
                          <span class="content__price">£<?php echo $row['offer_price'] ?></span>
                          <h3 class="content__title"><?php echo $row['offer_name'] ?></h3>
                          <p class="content__body"><?php echo $row['offer_description'] ?></p>
                        </div>
                      </div>
							<?php endwhile; ?>


					<?php  else: ?>
						<p>no offers</p>
					<?php  endif; ?>

</div>
  <!-- end foreach -->
<?php } ?>
    <?php include "./footer.php" ?>
    
</body>

</html>