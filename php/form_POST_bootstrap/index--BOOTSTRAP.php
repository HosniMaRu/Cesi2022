<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
            body{
                background-color:#848484;
            }
            .main{
                background-color: #f2f2f2;
                margin: 5%;
                border-radius: 5px;
            }
            .center{
                margin: auto;
                width:auto;
                padding:10px;
                text-align:center;
            }
            label{
                text-align:left;
                display:block;
            }
            .input_text{
                width:99%;
            }
        </style>
</head>
<body>
    <div class="main">
        <form class="needs-validation"  method="post" action=".\save.php"  novalidate>
            <div class="form-row" method="post" action=".\save.php">
                <div class="center col-md-6 mb-3">
                    <label for="fname">First name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Your name.." id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid Name.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="center col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Your email.." id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Email.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="center col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Your password.." id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Password.
                    </div>
                </div>
            </div>
            <div class="center">
                <input class="center btn btn-primary" type="submit"/>
            </div>
        </form>
    </div>
    <script src="./index.js"></script>
</body>
</html>