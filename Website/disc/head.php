<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./main.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <title>Bike King Border</title>
    
    <!-- cookies function -->
    <?php 
    if (isset($_REQUEST["usernamebox"])) {
        setcookie("stored_user_name", $_REQUEST["usernamebox"], time() + 604800, "/");
        $_COOKIE["stored_user_name"] = $_REQUEST["usernamebox"];
    }
    if (isset($_COOKIE["stored_user_name"])) {
        $user = $_COOKIE["stored_user_name"];
       
    } 
?> 
   
</head>