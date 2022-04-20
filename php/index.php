<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Hosni" />
    <meta name="description" content="php example" />
    <title></title>
    <link rel="stylesheet" href="" />
  </head>
  <body>
    <h1>Hello Wolrd!</h1>
    <?php
      /*   
      $a=1;            //  $ abre variable, "a" nombre variable, "1" valor variable.
      $a1=2;         
      $a2='2.3';         
      $b='hola';       //  Comillas simples, coste de proces mas bajo.
      $c="hola";       //  Comillas dobles, coste de proces mas alto.
      echo $a+$a1;     //  "+" Operacion numerica
      echo $a.$a1;     //  "." Concatenar
      */
      echo '<ul>';
      $num1=1;
      $num2=1;
      echo '<h1>.while</h1>';
      while ($num2<=10) {
        echo '<li>'.($num1+$num2++).'</li>';
      }
      echo '</ul>';
      echo '<ul>';
      echo '<h1>.for</h1>';
      for ($i=1; $i < 10; $i++) { 
        if ($i > 4) {
          echo '<li>'.$i.'</li>';
        }else if($i == 4){
          echo '<li>'.$i.' == 4</li>';
        }else{
          echo '<li>'.$i.' < 4</li>';
        }
      }
      echo '</ul>';
    ?>
    <h1>Bye Wolrd!</h1>
  </body>
</html>
