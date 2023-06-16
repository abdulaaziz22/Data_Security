<?php
    $encrypted_message = " ";
if (isset($_GET['submitE']))
{
    $_GET['number1'] = intval($_GET['number1']);
    $_GET['number2'] = intval($_GET['number2']);
    if ($_GET['number1']>=0){
    $encrypted_message = $_GET['number1'] % $_GET['number2'];
    }
    else{
    $_GET['number1']= $_GET['number1'] % $_GET['number2'];
    $encrypted_message = $_GET['number1'] + $_GET['number2'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo Operation</title>
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
    <form action="" method="GET" enctype="multipart/form-data">
    <div class="blurry">
        <div class="background-">
            <div class="page-">
                <div>
                  <H1>Modulo Operation</H1>
                </div>
                <div>
                    <!--<label>Selection</label>-->
                    <input class="submit- a-" type="button" value="Calculator" name="Encryption">

                </div>
                <div>
                  <!--<label>Plaintext</label>-->
                  <input type="text" required placeholder="Number" name="number1" value="">
                </div>
                <div>
                  <!--<label>Key</label>-->
                  <input type="text" required placeholder="Number" name="number2" value="">
                </div>
                <div>
                <div>
                  <!--<label>Equals</label>-->
                  <input class="submit-" type="submit" name="submitE" value="Ruselt" >
                </div>
                <div>
                    <!--<label>Result</label>-->
                    <input type="Result" placeholder="Ciphertext" name="Ciphertext" value="<?php echo $encrypted_message?>" readonly>
                  </div>
              </div>
        </div>
    </Div>
    </form>
</body>
</html>