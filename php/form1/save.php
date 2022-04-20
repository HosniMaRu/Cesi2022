<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Save</title>
        <link rel="stylesheet" href="./save.css">
    </head>
    <body>
        <?php
            $name = '';
            $email = '';
            $pass = '';
            $save = false;
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
            // ADD CONTENT TO FILE
            if ($save1&$save2&$save3) {
                $usuarios = new SimpleXMLElement('db.xml', 0, true);
                $nuevoUsuario = $usuarios->addChild('user');
                $nuevoUsuario->addChild('name', $name);
                $nuevoUsuario->addChild('email', $email);
                $nuevoUsuario->addChild('password', $pass);
                $nuevoUsuario->addChild('time', time());

                $usuarios->saveXML('db.xml');
                $save = true;
            }
            if(!$save){
                echo
                    '<form method="post" action=".\index.php"  class="form">
                        <input type="hidden"  value="'.$name.'"  name="fname" >
                        <input type="hidden" value="'.$email.'"  name="email" >
                        <input type="hidden" value="'.$pass.'" name="password" >
                        <p>No ha indicado los datos, vela atras.</p>
                        <input  type="submit" >
                    </form>';
            }else{
                echo
                    '<form method="post" action=".\table.php"  class="form">
                        <p>Acceso correcto.</p>
                        <input  type="submit" >
                    </form>';
            }
        ?>
        <div class="form inline">
            <p class=" <?php echo $check = ($name ) ?  'empty' :  'full'; ?>">Nombre: <?php echo $name ?></p>
            <p class="<?php echo $check = ($email ) ?  'empty' :  'full'; ?>">Email: <?php echo $email ?></p>
            <p  class="<?php echo $check = ($pass ) ?  'empty' :  'full'; ?>">Password: <?php echo $pass ?></p>
        </div>
    </body>
</html>