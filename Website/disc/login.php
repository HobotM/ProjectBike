<!DOCTYPE html>
<html lang="en">
<?php include "./head.php" ?>
<body>
<?php include ("./header.php"); ?>
<section>
   <!-- If already logged in redirect to index -->
<?php if (isLoggedIn()) {
    header('location: index.php');
}?> 

    
    <div class="login-container">
        <div class="user login-signin">
          <div class="imgBx"><img src="/ProjectBike/images/hero.jpg"></div>
             <div class="formBx">
               <form name="form" action="login.php" method="POST">
               <?php echo display_error(); ?>
               <h2>Sign In</h2>
              <input type="text" name="usernamebox" placeholder="Username">
             <input type="password" name="passwordbox" placeholder="Password">
                <input type="submit" id="button1" name="submitBtnLogin" value="Login">
             <p class="signup">Dont have an account? <a href="register.php">Sign Up</a></p>
             </form>
         </div>
        </div>

    </div>
    

 
</section>



    <?php include "./footer.php" ?>
    
</body>

</html>