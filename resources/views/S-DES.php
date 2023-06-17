<?php
$ciphertext[] = '';
function sdes(){
if (isset($_GET['submit'])){
$plaintext = $_GET['Plaintext'];
$key = $_GET['Key'];
$IP = array(2, 6, 3, 1, 4, 8, 5, 7);
$IPreverse = array(4, 1, 3, 5, 7, 2, 8, 6);
$EP = array(4, 1, 2, 3, 2, 3, 4, 1);
$S0 = array(
        array(1, 0, 3, 2),
        array(3, 2, 1, 0),
        array(0, 2, 1, 3),
        array(3, 1, 3, 2)
    );
    $S1 = array(
        array(0, 1, 2, 3),
        array(2, 0, 1, 3),
        array(3, 0, 1, 0),
        array(2, 1, 0, 3)
    );
$plaintext = str_split($plaintext);
$key = str_split($key);
 $plaintextIP = array();
 foreach ($IP as $bit) {
     $plaintextIP[] = $plaintext[$bit - 1];
 }
//  print_r($plaintextIP);
$middle = ceil(count($plaintextIP) / 2);
$L0 = array_slice($plaintextIP, 0, $middle);
$R0 = array_slice($plaintextIP, $middle);
// print_r($L0); // Outputs: Array ( [0] => 1 [1] => 2 [2] => 3 )
// print_r($right); // Outputs: Array ( [0] => 4 [1] => 5 [2] => 6 )
$L1 = $R0;
 $right1 = array();
 foreach ($EP as $bit) {
     $right1[] = $R0[$bit - 1];
 }
//  print_r($right1);

// XOR
for ($i=0; $i<8; $i++)
{
    if ($right1[$i]==$key[$i])
    $rus[] = 0;
    else
    $rus[] = 1; 
}
//  print_r($rus);

$middle = ceil(count($rus) / 2);
$left = array_slice($rus, 0, $middle);
$right = array_slice($rus, $middle);
// print_r($left); // Outputs: Array ( [0] => 1 [1] => 2 [2] => 3 )
// print_r($right); // Outputs: Array ( [0] => 4 [1] => 5 [2] => 6 )

// S0
    $row = $left[0] . $left[3];
    $col = $left[1] . $left[2];
    $row = bindec($row);
    $col = bindec($col);
    $output = $S0[$row][$col];
    while (strlen($output) < 2) {
        $output = '0' . $output;
    }
     $left =  decbin($output);

// S1
$row = $right[0] . $right[3];
$col = $right[1] . $right[2];
$row = bindec($row);
$col = bindec($col);
$output = $S1[$row][$col];
while (strlen($output) < 2) {
    $output = '0' . $output;
}
 $right =  decbin($output);

$right = str_split($right);
$left = str_split($left);

// Combine with the left half and return the result
$aftresbox  = array_merge($left, $right);
// print_r($aftresbox);

//xor L0 
for ($i=0; $i<4; $i++)
{
    if ($aftresbox[$i]==$L0[$i])
    $rus1[] = 0;
    else
    $rus1[] = 1; 
}
// print_r($rus1);

// Xor R0
for ($i=0; $i<4; $i++)
{
    if ($R0[$i]==$rus1[$i])
    $R1[] = 0;
    else
    $R1[] = 1; 
}
// print_r($R1);
$f1  = array_merge($R1, $L1);
// print_r($f1);

// ip reverse
$ciphertext = array();
 foreach ($IPreverse as $bit) {
     $ciphertext[] = $f1[$bit - 1];
 }
 foreach ($ciphertext as $value) {
    echo $value . ' ';
}
// print_r($ciphertext);
return $ciphertext;

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-DES</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Open Sans, sans-serif;
            margin: 0px;
            background-color: #f9f9f9;
        }
        .blurry {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .8);
            text-align: center;
            left: 0;
            position: fixed;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1100;
        }

        .background- {
            width: 700px;
            height: auto;
            padding: 50px;
            background-color: #03989b;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #03989b;
        }

        .page- {
            width: 600px;
            height: auto;
            padding: 20px 0px;
            border-radius: 100px 0px 100px 0px;
            background-color: #f9f9f9;
            position: relative;
        }

        h1 {
            color: #03989b;
        }

        input {
            width: 80%;
            height: 50px;
            padding: 0px 10px 0px 10px;
            background: #fff;
            border-radius: 5px;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid #dadde1;
        }

        .a- {
            width: 40%;
        }

        .a-:focus {
            color: #03989b;
            background-color: #fff;
            border: 1px solid #03989b;
        }

        .submit- {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            background-color: #03989b;
        }

        .submit-:hover {
            color: #03989b;
            background-color: #fff;
            border: 1px solid #03989b;
        }

        .note {
            display: flex;
            flex-wrap: wrap;
        }

        p {
            color: #999b99;
            font-size: 12px;
            text-align: left;
            margin: 0px 0px 0px 5px;
        }

        .star {
            color: red;
            font-size: 15px;
            margin-left: 65px;
        }

        hr {
            width: 40%;
            color: #03989b;
        }

    </style>
</head>
<body>
<form action="" method="GET" enctype="multipart/form-data">
    <div class="blurry">
        <div class="background-">
            <div class="page-">
                <div>
                  <H1>S-DES</H1>
                  <!--<label>Plaintext</label>-->
                  <input type="text" required placeholder="Plaintext" name="Plaintext" value="">
                </div>
                <div>
                    <div class="note"><p class="star">*</p><p>IP = [2,6,3,1,4,8,5,7]</p></div>
                    <div class="note"><p class="star">*</p><p>E/P = [4,1,2,3,2,3,4,1]</p></div>
                </div>
                <div>
                  <!--<label>Key</label>-->
                  <input type="text" required placeholder="Key" name="Key" value="">
                </div>
                <div>
                  <!--<label>Equals</label>-->
                  <input class="submit-" type="submit" name="submit" value="Result" >
                </div>
                <div>
                    <!--<label>Result</label>-->
                    <input type="Result" placeholder="Ciphertext" name="Ciphertext" value="<?php  sdes();?>" readonly>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>