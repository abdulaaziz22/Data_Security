<?php
$ciphertext[] = '';

    function generate_subkeys() {
    if (isset($_GET['submit'])){

    // Step 1: Permute the 10-bit key using P10
    $key = permute($_GET['Key'], array(2, 4, 1, 6, 3, 9, 0, 8, 7, 5));
    
    // Step 2: Split the key into two halves
    $left = substr($key, 0, 5);
    $right = substr($key, 5);
    
    // Step 3: Perform circular left shifts on each half
    $left = left_shift($key, 1);
    $right = left_shift($key, 1);
    
    // Step 4: Combine the shifted halves and permute using P8 to generate the first subkey
    $subkey1 = permute($left . $right, array(5, 2, 6, 3, 7, 4, 9, 8));
    
    // Step 3 again, but with different shift amounts for the second round
    $left = left_shift($key, 2);
    $right = left_shift($key, 2);
    
    // Step 4 again to generate the second subkey
    $subkey2 = permute($left . $right, array(5, 2, 6, 3, 7, 4, 9, 8));
    
    
    print_r(array($subkey1, $subkey2));
  }
}
  
  function permute($input, $table) {
    $output = '';
    foreach ($table as $position) {
      $output .= $input[$position];
    }
    return $output;
  }
  
  function left_shift($input, $shift) {
    return substr($input . $input, $shift, strlen($input));
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
                  <H1>Key Generation</H1>
                  <!--<label>Plaintext</label>-->
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
                    <input type="Result" placeholder="Ciphertext" name="Ciphertext" value="<?php  generate_subkeys();?>" readonly>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>