<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'bike_king');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['submitBtnSignUp'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password1']);
	$password_2  =  e($_POST['password2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO customers (customer_name, customer_email, user_type, customer_password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: user.php');
		}else{
			$query = "INSERT INTO customers (customer_name, customer_email, user_type, customer_password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM customers WHERE customer_id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
////////////////////////ADD USER//////////////////
if (isset($_POST['submitAddUser'])) {
	addUser();
}
function addUser(){
	// call these variables with the global keyword to make them available in function
	global $db, $username, $type , $email, $first, $last;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password1']);
	$first  	 = 	e($_POST['first_name']);
	$last  		 =  e($_POST['last_name']);
	$type 		 = 	e($_POST['user_type']);



	// ADD USER
	
		$password = md5($password_1);//encrypt the password before saving in the database
		$query1 = "INSERT INTO customers (customer_name, customer_password, user_type, customer_email, first_name, last_name) 
					  VALUES('$username','$password', '$type', '$email', '$first', '$last')";
			mysqli_query($db, $query1);
			$_SESSION['success']  = "New user successfully created!!";

			
			$insertid = mysqli_insert_id($db);

}




//--------------------------LOGIN-----------------------


// call the login() function if login_btn is clicked
if (isset($_POST['submitBtnLogin'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['usernamebox']);
	$password = e($_POST['passwordbox']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM customers WHERE customer_name='$username' AND customer_password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: staff.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: user.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}

	
	include "./cookies.php";
	if($user) {
  	echo "Hi $user!\n Welcome to our store!";
	}
	
	echo "<br>";

	

}



function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}




/// PRINT OFFERS///
function offers(PDO $db){
	$stmt = "select * from offers";
	$stmt = $db->prepare($stmt);
	$stmt->execute();
	
	$count =$stmt->rowCount();
	if($count>0) {
		echo "<h3>Offers</h3>";
	
		while($row=$stmt->fetch()){
	
			echo '<div class="Jumbotron">';
			echo '<h3 class="display-9" >'.$row["offer_name"].'</h3>';
			echo '<p class="lead" >'.$row["offer_description"].'</p>';
			echo '<p>£'.$row["offer_price"].'</p>';
			echo '<a class="btn btn-primary btn-lg" href="#" role="button" >Learn More </a>';
			echo '<hr class="my-9" >';
			echo '<p class="lead" >';
			echo '</p></div>';
		
			if(isset($_SESSION['staff'])) {
			 
							echo '<a href="offer_update.php?update=".$row["offer_id"]." type="button" class="btn btn-info btn-sm"> Edit </a>';
							echo '<a href="offer_delete.php?offer_delete=".$row["offer_id"]." type="button" class="btn btn-danger btn-sm"> Delete </a>';
		
						  
			}
			elseif(isset($_SESSION['customer'])){
			}
		
			else{
				?>
				<script>alert("we've not found a record")</script>
				<?php
			}
			
		}
	
		}
	
	}

////////////////////////ADD OFFER//////////////////
if (isset($_POST['submitAddOffer'])) {
	addOffer();
}
function addOffer(){
	// call these variables with the global keyword to make them available in function
	global $db, $offerName, $offerDesc , $offerPrice;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$offerName    =  e($_POST['offer_name']);
	$offerDesc       =  e($_POST['offer_description']);
	$offerPrice  =  e($_POST['offer_price']);
	



	// ADD OFFER
	
		
		$query1 = "INSERT INTO offers (offer_name, offer_description, offer_price) 
					  VALUES('$offerName','$offerDesc', '$offerPrice')";
			mysqli_query($db, $query1);

			
			

}


	


?>