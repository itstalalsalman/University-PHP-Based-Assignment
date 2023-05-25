 <!-- 
        Name: Talal Salman Zafeer
        ID: 22001483
        HW-01-Q2
     -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <title>Question-02</title>
    <style>
        *{font-family: 'Inter', sans-serif;}
        .number{
            margin-top: -44px;           
        }
        .bold{
            font-weight: bold;
        }
        table{
            margin: 0 auto;
        }
        h1{
           margin-left: 35%;
        }
    </style>
</head>
<body>
<h1>Top 10 Crowded Countries</h1>
<table>

<?php
     include "./db.php";
    $population = array_column($countries, 'population');
array_multisort($population, SORT_DESC, $countries);
for($i=0; $i<10; $i++){
    foreach($countries as $country){
        if($population[$i] == $country['population']){
        echo "<tr>";
        echo "<td><p class = 'number'>". ($i+1).".";
        echo "</p></td>";
        echo "<td><div>";
         echo "<p class ='bold'>".strtoupper($country['name'])."</p>";       
         echo "<p>Capital: <span class = 'bold'>".$cities[$country['capital']]['name']."</span></p>";     
         $mostPop = 0;
         $mostPopName='';
         foreach($cities as $city){
            if($cities[$country['capital']]['code']== $city['code']){
                if($city['population']>$mostPop){
                $mostPop = $city['population'];
                $mostPopName = $city['name'];    }           
            }          
         }  
         echo "<p>Most Crowded City: <span class= 'bold'>".$mostPopName.":</span> ".$mostPop."</p>"; 
        echo " </div></td>"     ; 
        echo "</tr>";
    
        }
    }
}
    ?>
    </table>
    
   
</body>
</html>