<!DOCTYPE html>
<html lang="en">

<?php include "./head.php" ?>

<body>


	<?php include "./header.php" ?>


	<div class="admin-wrapper">
		
		<?php 
		if (!isAdmin()) {
			$_SESSION['msg'] = "You must log in first";
			header('location: login.php');}?>

		<div class="info-section">
			



			<div class="offers">
				<h3 class="form-title">USERS</h3>
				<div class="offers__row d-inline-block">
					<span class="offers__id d-inline-block">Id</span>
					<span class="offers__name d-inline-block">Username</span>
					<span class="offers__description d-inline-block">User Type</span></span>
					<span class="offers__description d-inline-block">Email</span>
					<span class="offers__price d-inline-block">First</span>
					<span class="offers__price d-inline-block">Last</span>
					<span class="offers__price d-inline-block">Password</span>
					<span class="offers__btn d-inline-block">Update</span>
					<span class="offers__btn d-inline-block">Delete</span>
				</div>			

				<?php

				// delete record
				if( isset( $_POST['deleteUser'] ) ) {

					$did = $_POST['customer_id'];
					$query = $db->prepare( "DELETE FROM customers WHERE customer_id=?" );
					$query->bind_param( "s", $did );
					$query->execute();
				}

				// Update record
				if( isset( $_POST['updateUser'] ) ) {

					$customer_id 		= $_POST['customer_id'];
					$customer_name 		= $_POST['customer_name'];
					$user_type 			= $_POST['user_type'];
					$customer_email 	= $_POST['customer_email'];
					$first_name 		= $_POST['first_name'];
					$last_name 			= $_POST['last_name'];
					$customer_password 	= $_POST['customer_password'];
					$did 				= $_POST['customer_id'];

					

					$query1 = "UPDATE customers SET customer_name='$customer_name', user_type='$user_type', customer_password='$customer_password', first_name='$first_name ', last_name='$last_name' WHERE customer_id='$customer_id'";
					mysqli_query($db, $query1);
		
					}

				// if number of record found and more than 0 then create a table with all records
				$stmt = "SELECT customer_id, customer_name, user_type, customer_password, customer_email, first_name, last_name FROM customers";
				$result1 = $db ->query($stmt);
				if ($result1-> num_rows >0):

					while($row = $result1 -> fetch_assoc()):
						?>
					<!-- print all records plus DELETE BUTTON -->
					<div class="offers__row">

						<span class="offers__id"><?php echo $row['customer_id'] ?></span>
						<form class="form-offers-update d-inline-block" action="" method="POST">
							<input type="hidden" name="customer_id" value="<?php echo $row['customer_id'] ?>">
							<input class="offers__name" type="text" name="customer_name" value="<?php echo $row['customer_name'] ?>">
							<input class="offers__description" type="text" name="user_type"value="<?php echo $row['user_type'] ?>">
							<input class="offers__description" type="email" name="customer_email" value="<?php echo $row['customer_email'] ?>">
							<input class="offers__price" type="text" name="first_name" value="<?php echo $row['first_name'] ?>">
							<input class="offers__price" type="text" name="last_name" value="<?php echo $row['last_name'] ?>">
							<input class="offers__price" type="password" name="customer_password" value="<?php echo $row['customer_password'] ?>">
							<input class="offers__btn" type="submit" value="Update" name="updateUser">
						</form>
						<form class="d-inline-block offers__btn" action="" method="POST">
							<input type="hidden" name="customer_id" value="<?php echo $row['customer_id'] ?>">
							<input class="offers__btn" type="submit" value="Delete" name="deleteUser">
						</form>

					</div>
					<?php endwhile; ?>

				<?php  else: ?>
				<p>no result</p>
				<?php  endif; ?>

			</div>

			<!-- FORM FOR ADDING A  USER -->
			<div class="">
				<div class="">
					<div class="">
						<form name="form1" action="" method="POST">
							<h3 class="form-title">Add user</h3>
							<input type="text" name="username" placeholder="Username">
							<input type="email" name="email" placeholder="Email">
							<input type="text" name="user_type" placeholder="user or admin">
							<input type="password" name="password1" placeholder="Add Password">
							<input type="text" name="first_name" placeholder="First Name">
							<input type="text" name="last_name" placeholder="Last Name">
							<input class="offers__btn" type="submit" name="submitAddUser" value="Add">
						</form>
					</div>
				</div>
			</div>















					
			<div class="offers">
				<h3 class="form-title">SPECIAL OFFERS</h3>
				<div class="offers__row d-inline-block">
					<span class="offers__id d-inline-block">Id</span>
					<span class="offers__name d-inline-block">Offer Name</span>
					<span class="offers__description d-inline-block">Offer Description</span>
					<span class="offers__price d-inline-block">Offer Price</span>
					<span class="offers__btn d-inline-block">Update</span>
					<span class="offers__btn d-inline-block">Delete</span>
				</div>			

				<?php
				// DELETE OFFER
				if( isset( $_POST['deleteOffer'] ) ) {

					$did = $_POST['offer_id'];
					$query = $db->prepare( "DELETE FROM offers WHERE offer_id=?" );
					$query->bind_param( "s", $did );
					$query->execute();
				}

				// UPDATE OFFER
				if( isset( $_POST['updateOffer'] ) ) {

					$offer_id 			= $_POST['offer_id'];
					$offer_name 		= $_POST['offer_name'];
					$offer_description 	= $_POST['offer_description'];
					$offer_price 		= $_POST['offer_price'];

					$query1 = "UPDATE offers SET offer_name='$offer_name', offer_description='$offer_description', offer_price='$offer_price' WHERE offer_id='$offer_id'";
					mysqli_query($db, $query1);

					}

				// if number of record found and more than 0 then create a table with all records
				$stmt = "SELECT offer_id, offer_name, offer_description, offer_price FROM offers";
				$result1 = $db ->query($stmt);
				if ($result1-> num_rows >0):

					while($row = $result1 -> fetch_assoc()):
						?>
					<!-- print all records plus DELETE BUTTON -->
					<div class="offers__row">

						<span class="offers__id"><?php echo $row['offer_id'] ?></span>
						<form class="form-offers-update d-inline-block" action="" method="POST">
							<input type="hidden" name="offer_id" value="<?php echo $row['offer_id'] ?>">
							<input class="offers__name" type="text" name="offer_name" value="<?php echo $row['offer_name'] ?>">
							<input class="offers__description" type="text" name="offer_description"value="<?php echo $row['offer_description'] ?>">
							<input class="offers__price" type="text" name="offer_price" value="<?php echo $row['offer_price'] ?>">
							<input class="offers__btn" type="submit" value="Update" name="updateOffer">
						</form>
						<form class="d-inline-block offers__btn" action="" method="POST">
							<input type="hidden" name="offer_id" value="<?php echo $row['offer_id'] ?>">
							<input class="offers__btn" type="submit" value="Delete" name="deleteOffer">
						</form>

					</div>
					<?php endwhile; ?>

				<?php  else: ?>
				<p>no result</p>
				<?php  endif; ?>

			</div>

			<!-- FORM FOR ADDING A SPECIAL OFFER -->
			<form name="form1" action="" method="POST">
				<h3 class="form-title">Add offer</h3>
				<input type="text" name="offer_name" placeholder="Offer Name">
				<input type="text" name="offer_description" placeholder="Offer Description">
				<input type="text" name="offer_price" placeholder="Offer Price">
				<input class="offers__btn" type="submit" name="submitAddOffer" value="Add">
			</form>
		
		</div>
	</div>

</body>








</html>