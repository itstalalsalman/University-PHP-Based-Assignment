 <!-- 
        Name: Talal Salman Zafeer
        ID: 22001483
        HW-01-Q1
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
    <title>Question-01</title>
   
    <style>
        *{font-family: 'Inter', sans-serif;}
        .stats{text-align: center; font-weight: bold; font-size: 40px;}
        .rand-nums{
            text-align: center;
            display: flex;
            gap: 20px;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .data{
            width: 400px;
            height: 200px;
            border: 1px solid black;
        }
        .data {margin-left: auto; margin-right: auto;
        font-size: 18px;
        height: 500px;}

        .head {background-color: white;}
        table, td,th{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .blue{
            background:#22FFFF;
        }
    </style>
</head>
<body>
    
    <h1 class = 'stats'>Statistics</h1>
    
    <div class = 'rand-nums'>
        <?php
            
            
            $nums = [];
            for ($i= 0; $i < 30; $i++) 
            { 
                $num = rand(0,9);
                $nums[$i] = $num;
                echo "<p>";
                echo $num. " ";
                echo "</p>";
            }
            
        ?>
    </div>
    <?php
            $freq = array_fill(0, 10, 0);

            for($j =0; $j < count($freq); $j++){
            for($i =0; $i<count($nums);$i++){ 
                if($j===$nums[$i]){
                $freq[$j]++;
               } 
            }}
            $avg = array_sum($nums) / count($nums);
            $val = 0.0;
            foreach ($nums as $i){
                $val +=pow(($i - $avg),2);
            }
            $std_deviation = (float)sqrt($val/array_sum($nums));

            
        ?>
    <table class = 'data'>
        <tr class = 'head'>
            <th>Number</th>
            <th>Freq</th>
        </tr>
        <?php
        for($i=0;$i<count($freq);$i++){
            echo "<tr>";
            echo "<td class = 'blue'>";
            echo  $i ." </td>";
            echo "<td>".$freq[$i];
            echo "</td>";
            echo"</tr>";
        }
        echo"<tr>";
        echo "<td class = 'blue'>Average</td>";
        echo "<td>".$avg."</td>";
        echo"</tr>";
        echo"<tr>";
        echo "<td class = 'blue'>Std Dev</td>";
        echo "<td>".$std_deviation."</td>";
        echo"</tr>";
        
        ?>
       

    </table>


</body>
</html>