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
    $register_login = '';
    $save_name = false;
    $save_email = false;
    $save_pass = false;
    $save_register_login = false;
    $repeat_email = false;
    $usuarios = new SimpleXMLElement('db.xml', 0, true);

    function encrypt($txt, $t, $condition)
    {
        switch ($condition) {
            case 'pass':
                $token = 'abc';
                $tokenizer = $token . $txt . $t;
                $hash = hash('gost', $tokenizer, false);
                return $hash;
            case 'email':
                $token = 'abc';
                $tokenizer = $token . $txt;
                $hash = hash('gost', $tokenizer, false);
                return $hash;
            default:
                echo 'fail switch';
                break;
        }
    }

    function saveDB($usuarios, $name, $email, $pass)
    {
        $time = time();
        $nuevoUsuario = $usuarios->addChild('user');
        $nuevoUsuario->addChild('name', $name);
        $nuevoUsuario->addChild('date', $time);
        $nuevoUsuario->addChild('email', encrypt($email, $time, 'email'));
        $nuevoUsuario->addChild('password', encrypt($pass, $time, 'pass'));

        $usuarios->saveXML('db.xml');
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET['fname'])) {
            $name = $_GET['fname'];
            $save_name = true;
        }
        if (!empty($_GET['email'])) {
            $email = $_GET['email'];
            $save_email = true;
        }
        if (!empty($_GET['pass'])) {
            $pass = $_GET['pass'];
            $save_pass = true;
        }
        if (!empty($_GET['register_login'])) {
            $register_login = $_GET['register_login'];
            $save_register_login = true;
        }
    }
    if ($register_login == 'register') {
        foreach ($usuarios as $key => $value) {
            if ($value->email == encrypt($email, $value->date, 'email')) {
                echo
                '<form method="get" action=".\form_GET.php"  class="form">
                    <h1>EL MAIL YA EXISTE</h1>
                    <input  type="submit" >
                </form>';
                $repeat_email = true;
            }
        }
        if ($repeat_email == false) {
            if ($save_name & $save_email & $save_pass & $save_register_login) {
                saveDB($usuarios, $name, $email, $pass);
                echo
                '<form method="get" action=".\table.php"  class="form">
                        <p>Acceso correcto.</p>
                        <input  type="submit" >
                    </form>';
            } else {
                echo
                '<form method="get" action=".\form_GET.php"  class="form">
                        <input type="hidden"  value="' . $name . '"  name="fname" >
                        <input type="hidden" value="' . $email . '"  name="email" >
                        <input type="hidden" value="' . $pass . '" name="password" >
                        <input type="hidden" value="' . $register_login . '" name="register_login" >
                        <p>No ha indicado los datos, vela atras.</p>
                        <input  type="submit" >
                    </form>';
    ?>
                <div class="form inline">
                    <p class=" <?php echo $check = ($name) ?  'empty' :  'full'; ?>">Nombre: <?php echo $name ?></p>
                    <p class="<?php echo $check = ($email) ?  'empty' :  'full'; ?>">Email: <?php echo $email ?></p>
                    <p class="<?php echo $check = ($pass) ?  'empty' :  'full'; ?>">Password: <?php echo $pass ?></p>
                </div>
    <?php
            }
        }
    } else if ($register_login == 'login') {
        $count_usuarios_mail = 0;
        echo
        '<form method="get" action=".\form_GET.php" class="form">';
        foreach ($usuarios as $key => $value) {
            if ($value->email == encrypt($email, $value->date, 'email')) {
                if ($value->password == encrypt($pass, $value->date, 'pass')) {
                    echo '<h1>Bienvenido ' . $value->name . '</h1>';
                    break;
                } else {
                    echo '<h1>Contraseña incorrecta</h1>';
                }
            } else {
                $count_usuarios_mail++;
                if ($count_usuarios_mail >= count($usuarios)) {
                    echo '<h1>Email incorrecto</h1>';
                }
            }
        }
        echo
        '<input type="submit">
        </form>';
    }
    ?>
</body>

</html>