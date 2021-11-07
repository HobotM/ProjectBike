

<!-- GOOGLE MAP CONNECTED TO GOOGLE MAPS API -->

<!DOCTYPE html>
<html lang="en">
<?php include "./head.php" ?>

<body>
<?php include ("./header.php"); ?>

    <h1>Local Map</h1>
    <div class="border"></div>
        <div id="map"></div>

        <?php include "./footer.php" ?>

<!-- latitude and logitude + location on the map-->
<script>
    function initMap(){
        var location = {lat: 55.861142, lng: -4.250207};
        var map = new google.maps.Map(document.getElementById("map"),{
            zoom: 10, 
            center: location // center on location
        });
        var marker = new google.maps.Marker({
            position: location, // position on location
            map: map 
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKGTqH4o5haW9FNZxhk1jM9_K6e1lNqRM&callback=initMap"> // API connection


</script>


</body>
</html>
