<?php
    require "db.php";
    $tName = isset($_GET["add"]) ? $_GET["add"] : "";
    $_SESSION["add"][] = isset($_GET["add"]) ? $_GET["add"] : "";
    //var_dump($_SESSION);


?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>
<body>
    <input type="text" name="srch" id="search" placeholder = 'Enter....'>
    <table>
        <tr>
            <th>Team</th>
            <th>Project Name</th>
            <th>Supervisor</th>
            <th>Tags</th>
            <th>Like</th>
        </tr>
        <?php 
        if($tName){
           
            foreach($proj as $p)
            {

                foreach($tg as $tq){
                    if(in_array($tName, $tq)){
                        if($tq['team'] === $p['team'])
                        {
                        echo "<tr>";
                        echo "<td>". $p['team'] ."</td>";
                        echo "<td>". $p['name'] ."</td>";
                        echo "<td>". $p['supervisor'] ."</td>";
                        echo "<td>";
                        foreach($tg as $t){
                        if($p['team'] === $t['team']){
                            echo "<div class = 'tag'><a href ='?add=".$t['tagName']."'>". $t['tagName'] ."</a></div>";
                        }
                    }
                    echo "</td>";
                    

                    if ($p['likeit'] === 0)
                    {
                        echo "<td>&#129293</td>";
                    }
                    else{
                        echo "<td>&#128153</td>"; 
                    }

                    echo "</tr>";
                        }
                    }
                }
            }
        } 
        if(strlen($tName) <= 0){
            //var_dump("hello");
            foreach($proj as $p)
            {

                echo "<tr>";
                echo "<td>". $p['team'] ."</td>";
                echo "<td>". $p['name'] ."</td>";
                echo "<td>". $p['supervisor'] ."</td>";
                echo "<td>";
                foreach($tg as $t){
                if($p['team'] === $t['team']){
                        echo "<div class = 'tag'><a href ='?add=".$t['tagName']."'>". $t['tagName'] ."</a></div>";
                    }
                }
                if ($p['likeit'] === 0)
                {
                        echo "<td>&#129293</td>";
                }
                else{
                        echo "<td>&#128153</td>"; 
                }
                echo "</td>";
                echo "</tr>";
                }
            }
    
        ?>
    </table>

    
</body>
</html>