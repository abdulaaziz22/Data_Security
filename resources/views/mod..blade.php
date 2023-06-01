<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mod</title>
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

        .mod-background {
            width: 700px;
            height: 700px;
            background-color: #03989b;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #03989b;
        }

        .mod-page {
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

        .equals-submit {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            background-color: #03989b;
        }

        .equals-submit:hover {
            color: #03989b;
            background-color: #fff;
            border: 1px solid #03989b;
        }
    </style>
</head>
<body>
    <div class="blurry">
        <div class="mod-background">
            <div class="mod-page">
                <div>
                  <H1>mod "%"</H1>
                </div>
                <div>
                  <!--<label>Number1</label>-->
                  <input type="number" required placeholder="number1" name="number1" value="">
                </div>
                <div>
                  <!--<label>Number2</label>-->
                  <input type="number" required placeholder="number1" name="number2" value="">
                </div>
                <div>
                <div>
                  <!--<label>Equals</label>-->
                  <input class="equals-submit" type="submit" placeholder="=" name="equals">
                </div>
                <div>
                    <!--<label>Result</label>-->
                    <input type="Result" placeholder="Result" name="user" value="" readonly>
                  </div>
              </div>
        </div>
    </Div>
</body>
</html>