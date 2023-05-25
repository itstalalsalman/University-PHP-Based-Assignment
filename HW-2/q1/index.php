<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <!--
    Name: Talal Salman Zafeer
    ID: 22001483
    HomeWork-02
    -->
    <title>Homework-02</title>

</head>
<body>
    
    <?php
        require "fruits.php";
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            extract($_POST);
            // var_dump($_POST);
            if( !isset($fruit))
            {
                $msg = "At least one fruit must be selected!";
            }
            if(!isset($payment)){
                $msg2 = "Payment must be selected";
            }
            $v_reg = '/^4\d{3}\-\d{4}\-\d{4}\-\d{4}$/'; 
            $m_reg  = '/^TCKT\-[a-zA-Z]{3}\-\d{4,6}$/';
            if (isset($payment)) {
                switch($payment)
                {
                    case 0:
                        if(preg_match($v_reg, $number) === 0)
                        {
                            $msg3 = "Visa format is invalid";
                        }
                    break;
                    case 1:
                        if(preg_match($m_reg, $number) === 0)
                        {
                            $msg3 = "MultiNet format is invalid";
                        }
                    break;
                }
            }
        }
        //var_dump($fruit);
        $head = isset($msg) || isset($msg2) || isset($msg3) ? "Form Invalid" : "Form Validated" ;
        $class = isset($msg) || isset($msg2) || isset($msg3) ? "invalid" : "valid" ;
    ?>

    <div>
        <h1 class = '<?= isset($_POST) ? $class : "" ?>' >
            <?= $_SERVER["REQUEST_METHOD"] === "POST" ? $head : "" ?>
        </h1>
    </div>

    <form action="" method = "post">
        
        <div class = "div-error">
            <h3>Fruits</h3>
            <p><?= isset($msg) ? $msg : "" ?></p>
        </div>

        <table>
            
            <?php
            $i = 1;
            echo "<tr>";

            foreach($fruits as $f)
            {
                echo "<td>";
                echo "<input type='checkbox' name='fruit[]' id='' value  = '" .$f['price']. "'>";
                echo $f['name']. " - " .$f['price'] . " ₺";
                echo "</td>";
                if ($i % 3 === 0)
                {
                    echo "</tr>";
                    echo "<tr>";
                }
                $i++;
            }
            ?>

        </table>

        <div class = "div-error">
            <h3>Payment Method</h3>
            <p><?= isset($msg2) ? $msg2 : "" ?></p>
        </div>

        <input type="radio" name = "payment" value="0" <?= isset($payment) && $payment === "0" ? " checked " : "" ?> > VISA
        <input type="radio" name = "payment" value="1" <?= isset($payment) && $payment === "1" ? " checked " : "" ?> > MultiNet
        
        <div class = "div-error">
            <h3>VISA/MULTINET</h3>
            <p><?= isset($msg3) ? $msg3 : "" ?></p>
        </div>
        
        <input type="text" name= "number" value="<?= isset($quantity) ? filter_var($quantity, FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "" ?>">

        <input type="submit" name="pay" value = "Pay!!">
    </form>

</body>
</html>