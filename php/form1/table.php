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
                        }else{
                            echo '<tr>';
                            foreach ($user as $key1 => $value) {
                                echo '<td>'.$value.'</td>';
                            }
                            echo '</tr>';
                        }
                    }
                }  
            ?>
            <input  value="Return "type="submit" >
        </form>
    </body>
</html>