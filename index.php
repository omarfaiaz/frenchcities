<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <input type="text" id="livesearch" placeholder="search">
    <div id='para'></div>
    <div id="cord"></div>
    <?php
    $curl = curl_init();
        $where = urlencode('{
            "name": {
                "$exists": true
            }
        }');
    curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/Francecities_City?count=1&limit=10&order=name&keys=&where=' . $where);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'X-Parse-Application-Id: X6krfDdpMo2Y0t0p2QXJ3ir6k3OuszSZHDi02hwM', // This is your app's application id
        'X-Parse-REST-API-Key: 4B91Ev9wpSJe9NC80MTKx2D09zU1dFt57M0eCw00' // This is your app's REST API key
    ));
    $data = json_decode(curl_exec($curl)); // Here you have the data that you need
    print_r(json_encode($data, JSON_PRETTY_PRINT));
    curl_close($curl);
?>
    
    <?php

    $uri= 
$places = json_decode(file_get_contents('fr.json'),true);

if(isset($_POST['city'])){
    $name= strtolower($_POST['city']);
    foreach($places as $in=>$place){
        if(strpos(strtolower($place['city']),$name)!== false){ 
          
            
            ?>
            <input type="text" class="latlng" name="<?php echo strtolower($place["city"]) ?>" value="<?php echo $place["city"] ?>" data-area="<?php echo strtolower($place["city"]) ?>" data-lat="<?php echo $place["lat"] ?>" data-lng="<?php echo $place["lng"] ?>"><br>
            
            <script>
                    
            $(document).ready(function () {
                $(`.latlng[data-area='<?php echo strtolower($place['city']) ?>']`).click(function(){
                        // console.log( $(`.latlng[data-area='<?php //echo strtolower($place['city']) ?>']`).val());
                        let longitude =  $(this).data('lng');
                        let latitud = $(this).data('lat');
                        $.post('lng.php',{
                            lat: latitud,
                            lng: longitude
                        },
                        function(data,status){
                            $('#cord').html(data);
                    })
                
                })

            })

            </script>
        
          <?php 
      
        }
    }

}
?>

      

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="main.js"></script>
</html>