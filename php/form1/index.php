<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link rel="stylesheet" href="../../menu/menu.css" />
        <link rel="stylesheet" href="./index.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function() {
                $("#includedContent").load("/menu/menu.html");
            });
        </script>
    </head>
    <body>
        <div id="includedContent"></div>
        <div class="main">
            <?php
                $name = '';
                $email = '';
                $pass = '';
                $save1 = false;
                $save2 = false;
                $save3 = false;
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(! empty($_POST['fname'])){
                        $name = $_POST['fname'];
                        $save1 = true;
                    }
                    if(! empty($_POST['email'])){
                        $email = $_POST['email'];
                        $save2 = true;
                    }
                    if(! empty($_POST['password'])){
                        $pass = $_POST['password'];
                        $save3 = true;
                    }
                }
            ?>
            <form method="post" action=".\save.php" >
                <div class="center">
                    <label for="fname">Name:</label>
                    <input type="text"  minlength="2" value="<?php echo $name ?>" placeholder="Your name.." name="fname" class="input_text" >
                </div>
                <div class="center">
                    <label for="email">Email:</label>
                    <input type="email" value="<?php echo $email ?>" name="email" placeholder="Your email.." class="input_text" >
                </div>
                <div class="center">
                    <label for="password">Password:</label>
                    <input type="password" value="<?php echo $pass ?>" name="password" placeholder="Your password.." class="input_text" >
                </div>
                <div class="center">
                    <input  type="submit" >
                </div>
            </form>
        </div>
    </body>
</html>