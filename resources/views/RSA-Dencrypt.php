<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSA-Encrypt</title>
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

        .b- {
            width: 26%;
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

    </style>
</head>
<body>
    <div class="blurry">
        <div class="background-">
            <div class="page-">
                <div>
                  <H1>RSA-Encrypt</H1>
                  <!--<label>messaeg</label>-->
                  <input type="number" required placeholder="Cipher Text" name="Cipher Text" value="">
                </div>
                <div>
                  <!--<label>p</label>-->
                  <input class="b-" type="number" required placeholder="p" name="p" value="">
                  <!--<label>q</label>-->
                  <input class="b-" type="number" required placeholder="q" name="q" value="">
                  <!--<label>r</label>-->
                  <input class="b-" type="number" required placeholder="e" name="r" value="">
                </div>
                <div>
                  <!--<label>Equals</label>-->
                  <input class="submit-" type="submit" name="submit" value="Result" >
                </div>
                <div>
                    <!--<label>Result public key</label>-->
                    <input class="b-" type="Result" placeholder="Public Key" name="Public Key" value="" readonly>
                    <!--<label>Result message Encryption</label>-->
                    <input class="b-" type="Result" placeholder="Message Encryption" name="Message Encryption" value="" readonly>
                    <!--<label>d</label>-->
                    <input class="b-" type="Result" placeholder="d" name="d" value="" readonly>
                </div>
            </div>
        </div>
    </div>
</body>
</html>