
<!DOCTYPE html>
<html lang="en">

<?php include "./head.php" ?>

<body>
  

<?php include "./header.php" ?>
<?php if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    } else {?>

<?php // Update record
					if( isset( $_POST['UserUpdate1'] ) ) {

						$customer_id        = $_SESSION['user']['customer_id'];
						$customer_email 	= $_POST['customer_email'];
						$first_name 		= $_POST['first_name'];
						$last_name 			= $_POST['last_name'];
						$customer_password 	= $_POST['customer_password'];
			

						$customer_password = md5($customer_password);//encrypt the password before saving in the database

						$query1 = "UPDATE customers SET customer_email='$customer_email', customer_password='$customer_password', first_name='$first_name ', last_name='$last_name' WHERE customer_id='$customer_id'";
						mysqli_query($db, $query1);
			
                        
                      echo("<meta http-equiv='refresh' content='1'");

						} ?>

<div class="user-wrapper">
			
        
    <div class="inside-wrapper">
    <?php
        $customer_id        = $_SESSION['user']['customer_id'];

        $get_user = "SELECT customer_id, customer_email, first_name, last_name, customer_name FROM customers WHERE customer_id='$customer_id'";
        $result5 = $db ->query($get_user);

            if ($result5-> num_rows >0):
                while($row = $result5 -> fetch_assoc()):
                    ?>              
		<div class="left">
            <img src="/ProjectBike/images/bike_pic4.jpg" alt="user_photo" width="100">
            
            <h4> 
                <?php echo $row['first_name'];?>
                <?php echo $row['last_name']; ?>
            </h4>
        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                       <p><?php echo $row['customer_email'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
            <?php  endif; ?>
     </div>
	
 
    <form action="" method="POST">
    <input type="text" name="first_name" placeholder="Enter First Name"><br/>
    <input type="text" name="last_name" placeholder="Enter Last name"><br/>
    <input type="email" name="customer_email" placeholder="Enter new Email address"><br/>
    <input type="password" name="customer_password" placeholder="Enter new password"><br/>

    <input class="UserUpdate" type="submit" name="UserUpdate1" value="Update Data">
</form>
	</div>
</div>
</body>
<?php } ?>
<?php include ('footer.php');
    ?>
</html>