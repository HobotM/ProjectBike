<!DOCTYPE html>
<html lang="en">
<?php include "./head.php" ?>
<body>
<?php include ("./header.php"); ?>


<section>
   <!-- If logged in redirect to index -->
<?php  if (isset($_SESSION['user'])) {
        header("location: index.php");}
    ?>

<div class="login-container">
      <div class="user login-signup">       
         <div class="formBx">
            <form name="form1" action="register.php" method="POST">
            <?php echo display_error(); ?>
            <h2>Create an account</h2>
            
            <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <input type="password" name="password1" placeholder="Create Password">
            <input type="password" name="password2" placeholder="Confirm Password">

            <input type="submit" name="submitBtnSignUp" value="Sign Up">
            <p class="signup">Already have an account? <a href="login.php";>Sign In</a></p>
            </form>
            
         </div>
         <div class="imgBx"><img src="/ProjectBike/images/wheel.jpg"></div>
     </div>
 </div>
</section>



    <?php include "./footer.php" ?>
    
</body>

</html>