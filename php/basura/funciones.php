<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../menu/menu.css" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(function () {
        $("#includedContent").load("../../menu/menu.html");
      });
    </script>
  </head>
  <body>
    <div id="includedContent"></div>
    <div class="main">
        <?php
            function encrypt($txt){
                $token = 'abc';
                $t = date('y.m.d');
                $tokenizer = $token.$txt.$t;
                $hash = hash('gost', $tokenizer, false);
                return $hash;
            }
            echo encrypt('mail@mail.mail');
        ?>
    </div>
  </body>
</html>
