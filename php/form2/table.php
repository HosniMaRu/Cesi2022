<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Table</title>
        <link rel="stylesheet" href="./table.css">
    </head>
    <body>   
        <form method="post" action=".\index.php"  class="form">
            <input  value="Return "type="submit" >
            <?php
                $xml = simplexml_load_file('db.xml');
                if (!$xml) {
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
                            $thead = true;
                        }
                        echo '<tr>';
                        foreach ($user as $key1 => $value) {
                            if($key1 == 'date' || $key1 == 'time'){
                                echo '<td>'.date('Y-m-d', intval($value)).'</td>';
                            }else if($key1 == 'permissions'){
                                echo '<td>'.$valueInput = ($value == true) ? 'Yes' : 'No'.'</td>';
                            }else if($key1 == 'politicy'){
                                echo '<td>'.$valueInput = ($value == true) ? 'Yes' : 'No'.'</td>';
                            }else{
                                echo '<td>'.$value.'</td>';
                            }
                        }
                        echo '</tr>';
                    }
                }  
            ?>
        </form>
    </body>
</html>