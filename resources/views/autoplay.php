<?php 
    $encrypted_message = " ";
if (isset($_GET['submitE']))
{
    $plaintext = strtoupper(preg_replace("/[^A-Z]/", "", $_GET['Plaintext']));
  $key = strtoupper(preg_replace("/[^A-Z]/", "", $_GET['Key']));
  $key_len = strlen($key);

  // Generate key matrix
  $matrix = array();
  $key_chars = str_split($key);
  $remaining_chars = array_diff(range('A', 'Z'), $key_chars);
  $remaining_chars = array_values($remaining_chars);
  array_unshift($key_chars, null);
  for ($i = 0; $i < 6; $i++) {
    $matrix[$i] = array_slice($key_chars, $i, 5);
    if ($i == 0) {
      continue;
    }
    $matrix[$i] = array_merge($matrix[$i], array_slice($remaining_chars, ($i - 1) * 5, 5));
  }

  // Encrypt plaintext
  $encrypted_message = '';
  $len = strlen($plaintext);
  for ($i = 0; $i < $len; $i += 2) {
    $pair = substr($plaintext, $i, 2);
    $pos1 = array();
    $pos2 = array();
    for ($j = 0; $j < 6; $j++) {
      $pos1[] = array_search($pair[0], $matrix[$j]);
      $pos2[] = array_search($pair[1] ?? 'X', $matrix[$j]);
    }
    if ($pos1[0] == $pos2[0]) { // Same row
      $encrypted_message = $matrix[$pos1[0]][($pos1[1] + 1) % 5];
      $encrypted_message = $matrix[$pos2[0]][($pos2[1] + 1) % 5];
    } elseif ($pos1[1] == $pos2[1]) { // Same column
      $encrypted_message = $matrix[($pos1[0] + 1) % 6][$pos1[1]];
      $encrypted_message = $matrix[($pos2[0] + 1) % 6][$pos2[1]];
    } else { // Rectangle
      $encrypted_message = $matrix[$pos1[0]][$pos2[1]];
      $encrypted_message = $matrix[$pos2[0]][$pos1[1]];
    }
  }
}
elseif (isset($_GET['submitD']))
{
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additive Cipher</title>
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
            height: 700px;
            background-color: #03989b;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #03989b;
        }

        .page- {
            width: 600px;
            height: 600px;
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
    </style>
</head>
<body>
    <form action="" method="GET">
    <div class="blurry">
        <div class="background-">
            <div class="page-">
                <div>
                  <H1>Autokey Cipher</H1>
                </div>
                <div>
                    <!--<label>Selection</label>-->
                    <input class="submit- a-" type="button" value="Encryption" name="Encryption">
                    <input class="submit- a-" type="button" value="Decryption" name="Decryption">

                </div>
                <div>
                  <!--<label>Number1</label>-->
                  <input type="text" required placeholder="Plaintext" name="Plaintext" value="">
                </div>
                <div>
                  <!--<label>Number2</label>-->
                  <input type="number" required placeholder="Key" name="Key" value="">
                </div>
                <div>
                <div>
                  <!--<label>Equals</label>-->
                  <input class="submit-" type="submit" name="submitE" value="Encryption" >
                  <input class="submit-" type="submit" name="submitD" value="Decryption" >

                </div>
                <div>
                    <!--<label>Result</label>-->
                    <input type="Result" placeholder="Ciphertext" name="Ciphertext" value="<?php echo $encrypted_message ?>" readonly>
                  </div>
              </div>
        </div>
    </Div>
    </form>
</body>
</html>