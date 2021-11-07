<?php include('functions.php') ?>

      <!--Navbar-->
      <header class="main-header">
        <div class="logo">
            <a href="#">bkb</a>
        </div>
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="menu-icon__line"></span>
        </label>

        <ul class="nav-links">
            <li class="nav-link">
                <a href="index.php">HOME</a>
            </li>
            <li class="nav-link">
                <a href="gallery.php">GALLERY</a>
            </li>
            <li class="nav-link">
                <a href="services.php">SERVICES</a>
            </li>
            <li class="nav-link">
                <a href="contact.php">CONTACT</a>
            </li>
            <li class="nav-link">
                <a href="local.php">AREA</a>
            </li>
            <!-- Section below changes header links when session is on, depends if user type is admin or normal user -->
            <?php
                if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ){
                    
                    echo "<li class='nav-link'> <a href='user.php'>Profile page</a></li>";
                    echo "<li class='nav-link'> <a href='offers.php'>Special offers</a></li>";
                    echo "<li class='nav-link'> <a href='logout.php'>LOGOUT</a></li>";
                }elseif (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ){
                    echo "<li class='nav-link'> <a href='staff.php'>Admin page</a></li>";
                    echo "<li class='nav-link'> <a href='offers.php'>Special offers</a></li>";
                    echo "<li class='nav-link'> <a href='logout.php'>LOGOUT</a></li>";
                }
                
                else{
                    echo "<li class='nav-link'> <a href='login.php'>LOGIN</a></li>";
                    
                }

                
               

            ?>
           
        </ul>

        <!-- if user is logged script for standard keypress nav will work -->
        <?php if (!isLoggedIn()) {?>        
        <script>
        $(document).keypress(function(e){
            if($(":input").is(':focus')==0)
            switch(e.which){
                
                case 104:
                    window:location="index.php";
                    break;
                case 103:
                    window:location="gallery.php";
                    break;
                case 115:
                    window:location="services.php";
                    break;
                case 99:
                    window:location="contact.php";
                    break;
                case 97:
                    window:location="local.php";
                    break;
                case 108:
                    window:location="login.php";
                    break;
                case 114:
                    window:location="register.php";
                    break;
                
            }

        })</script>
        <?php } ?>
        
        <!-- if user is logged script for extended keypress nav will work -->
        <?php if (isLoggedIn()) {?>
        <script>
            $(document).keypress(function(e){
                if($(":input").is(':focus')==0)
                switch(e.which){
                    
                    case 104:
                        window:location="index.php";
                        break;
                    case 103:
                        window:location="gallery.php";
                        break;
                    case 115:
                        window:location="services.php";
                        break;
                    case 99:
                        window:location="contact.php";
                        break;
                    case 97:
                        window:location="staff.php";
                        break;
                    case 108:
                        window:location="login.php";
                        break;
                    case 114:
                        window:location="register.php";
                        break;
                    case 111:
                        window:location="offers.php";
                        break;
                    case 112:
                        window:location="user.php";
                        break;
                }

            })
        </script>
        <?php } ?>
    </header>
    
   

