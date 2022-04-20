<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body{
                background-color:#848484;
            }
            .form{
                background-color: #f2f2f2;
                margin: 5%;
                border-radius: 5px;
            }
            .center{
                margin: auto;
                width:30%;
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
            .value-content{
                padding: 5px;
                padding-left: 20px;
            }
            table{
                margin: auto;
                border-collapse: collapse;
            }
            th{
                background-color: green;
                border: black solid 1px;
            }
            td{
                border: black solid 1px;
                padding: 3px;
            }

        </style>
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

                var_dump($save1).'<br />';
                var_dump($save2).'<br />';
                var_dump($save3).'<br />';
            }

            // ADD CONTENT TO FILE
            if ($save1&$save2&$save3) {            // FALTA EL SAVE3
                $usuarios = new SimpleXMLElement('db.xml', 0, true);
                $nuevoUsuario = $usuarios->addChild('user');
                $nuevoUsuario->addChild('name', $name);
                $nuevoUsuario->addChild('email', $email);
                $nuevoUsuario->addChild('password', $pass);
                $nuevoUsuario->addChild('time', time());
                $usuarios->saveXML('db.xml');
                
                $save = true;
            }else {
                $name = '';
                $email = '';
                $pass = '';
            }
            if(!$save){
                unset($_POST['fname']);
                unset($_POST['lname']);
                unset($_POST['pass']);
            }
        ?>
        <div class="form">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="center">
                    <label for="fname">Name:</label>
                    <input type="text" name="fname" placeholder="Your name.." class="input_text">
                </div>
                <div class="center">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="input_text">
                </div>
                <div class="center">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="input_text" >
                </div>
                <div class="center">
                    <input type="submit">
                </div>
            </form>
        </div>
        <div class="form">
            <div class="value-content">
                <p>Nombre: <?php echo $name; ?></p>
            </div>
            <div class="value-content">	
                <p>Email: <?php echo $email; ?></p>
            </div>
            <div class="value-content">
                <p>Password: <?php echo $pass; ?></p>
            </div>
        </div>
        <?php


        if (!$xml = simplexml_load_file('db.xml')) {
            echo 'No se ha podido cargar el archivo.';
        } else {
            echo '<table>';
            $thead=false;
            foreach ($xml as $key =>$user) {
                if ($thead == false) {
                    echo '<tr>';
                    foreach ($user as $key1 => $value) {
                        echo '<th>'.$key1.'</th>';
                    }
                    echo '</tr>';
                }
                echo '<tr>';
                foreach ($user as $key1 => $value) {
                    echo '<td>'.$value.'</td>';
                }
                echo '</tr>';
                $thead = true;
            }
        }

            
        ?>
    </body>
</html>