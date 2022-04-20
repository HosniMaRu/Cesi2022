<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array = array(
            'hosni',
            'erik',
            'marc',
            'raquel'
        );
        var_dump($array);       //    Da mas informacion
        echo '<br /><br />';
        print_r($array);        //    Print normal
        echo '<br /><br />';

        var_dump($array[0]);
        echo '<br /><br />';
        print_r($array[0]);
        echo '<br /><br />';

        var_dump(count($array));     //  metodo count equivalente al array.lenght JS
        echo '<br /><br />';
        print_r(count($array));     //  metodo count equivalente al array.lenght JS
        echo '<br /><br />';
        
        for ($i=count($array) - 1; $i >= 0; $i--) { 
            echo $array[$i].'<br />';
        }
    ?>
    <?php
        echo '<br /><br />';
        array_push($array, 'mon', 'desire');    // PUSH
        print_r($array);
        echo '<br /><br />';
        
        unset($array[0]);                       //  Delete array position(s)
        print_r($array);
        echo '<br /><br />';
    ?>
    <?php
        $a = array(1 => 'one', 2 => 'two', 3 => 'three');
        var_dump($a);
        echo '<br /><br />';
        print_r($a);
        echo '<br /><br />';
        $b = array('a' => 'one', 'b' => 'two', 'c' => 'three');
        var_dump($b);
        echo '<br /><br />';
        print_r($b);
        echo '<br /><br />';
        print_r($b['a']);
        echo '<br /><br />';
        
        foreach ($a as $key => $value) {        // Asi no itero con el indexado numerico
            echo $key.' '.$value;
            echo '<br /><br />';
        }
    ?>
    <?php
        echo '---------------> simplexml_load_file <br />';
        if (!$xml = simplexml_load_file('db.xml')) {
            echo 'No se ha podido cargar el archivo.';
        } else {
            foreach ($xml as $user) {
                echo 'Nombre: '.$user->name.'<br />';
            }
        }

        echo '<br /><br />';
        
        echo '---------------> new SimpleXMLElement <br />';
        $usuarios = new SimpleXMLElement('db.xml', 0, true);
        $nuevoUsuario = $usuarios->addChild('user');
        $nuevoUsuario->addChild('name', 'Bernard');
        $nuevoUsuario->addChild('email', 'Madoff');
        $nuevoUsuario->addChild('password', 'Madoff');
        $nuevoUsuario->addChild('time', time());
        $usuarios->saveXML('db.xml');

        if (!$xml = simplexml_load_file('db.xml')) {
            echo 'No se ha podido cargar el archivo.';
        } else {
            foreach ($xml as $user) {
                echo 'Nombre: '.$user->name.'<br />';
            }
        }
        // var_dump($usuarios);
        
        // echo '<br /><br />';
        // if (!$json = file_get_contents('db.json')) {
        //     echo 'No se ha podido cargar el archivo.';
        // } else {
        //     $array = json_decode($json, true);
        //     foreach ($array as $key => $value) {
        //         echo'-------------> '.$key;
        //         foreach ($value as $key2 => $value2) {
        //             echo '--><br /><br />';    
        //             echo '---key2---> '.$key2;
        //             echo '---value---> '.$value2['name'];
        //         }
        //     }
        // }
    ?>
</body>
</html>