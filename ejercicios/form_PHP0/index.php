<?php       //  PHP 0
function printAge($age)
{
    switch ($age) {
        case 0: // Case = 0 porque sino me lo detecta como boolean.... creo
        case $age < 18:
            if ($age >= 16) {
                echo '<h2>Menor entre 16 y 18</h2>';
            } else {
                echo '<h2>Menor de edad</h2>';
            }
            break;
        case $age >= 18:
            echo '<h2>Mayor de edad</h2>';
            break;
    }
}
function form_to_num($num_form)
{
    assert(is_numeric($num_form), 'No ha introducido un numero');
    if (is_numeric($num_form)) {
        $num_form = number_format($num_form);
        printAge($num_form);
    } else {
        echo '<h2>No ha introducido un numero.</h2>';
    }
}
echo
'<style>
    h1 {
    background-color: grey;
    text-align: center;
    }
</style>';
echo '<h1>PHP 0</h1><br/>';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    assert($_SERVER["REQUEST_METHOD"] == "GET", 'Fallo en peticion GET');

    $getAge = $_GET['edad'];
    assert(!empty($getAge) || $getAge == 0, 'No ha introducido datos');

    if (!empty($getAge) || $getAge == 0) {
        form_to_num($getAge);
    } else {
        echo '<h2>No ha introducido datos.</h2>';
    }
} else {
    echo '<h2>Fail request.</h2>';
}

?>

<?php       //  PHP 0.1
echo '<h1>PHP 0.1</h1><br/>';

function check_empty($num1, $num2)
{
    assert((!empty($num1) || $num1 == 0) && (!empty($num2 || $num2 == 0)), 'No ha introducido datos');
    if ((!empty($num1) || $num1 == 0) && (!empty($num2 || $num2 == 0))) {
        $getNumber1 = $num1;
        $getNumber2 = $num2;
        assert(is_numeric($getNumber1) && is_numeric($getNumber2), 'No ha introducido valores numericos');
        if (is_numeric($getNumber1) && is_numeric($getNumber2)) {
            numeric_value($getNumber1, $getNumber2);
        } else {
            echo '<h2>No ha introducido datos numericos</h2>';
        }
    } else {
        echo '<h2>No ha introducido datos</h2>';
    }
}
function numeric_value($getNumber1, $getNumber2)
{
    $higgest = ($getNumber1 >= $getNumber2) ? $getNumber1 : $getNumber2;
    $lowest = ($getNumber1 <= $getNumber2) ? $getNumber1 : $getNumber2;
    assert($higgest >= $lowest, 'Higgest es menor que lowest');
    prtin_values($higgest, $lowest);
}
function prtin_values($higgest, $lowest)
{
    echo '<h2>' . $print_greater_than = ($higgest > $lowest) ? 'Numero mayor: ' : 'Numero: ';
    echo $print_higgest = !empty($higgest) || $higgest == 0 ? $higgest : 'Empty' . '</h2>';

    echo '<h2>' . $print_lower_than = ($higgest > $lowest) ? 'Numero menor: ' : 'Numero: ';
    echo $print_lowest = !empty($lowest) || $lowest == 0 ? $lowest : 'Empty' . '</h2>';

    echo '<h2>Operacion: ' . $print_op = ((!empty($higgest) || $higgest == 0) && (!empty($lowest) || $lowest == 0)) ? opera($higgest, $lowest) : 'No operation avaible' . '</h2>';
}
function opera($higgest, $lowest)
{
    $not_op = 'Can not divide by 0';
    if ($lowest == 0) {
        return $higgest . ' / ' . $lowest . ' = ' . $not_op;
    } else {
        return $higgest . ' / ' . $lowest . ' = ' . $higgest / $lowest;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    assert($_SERVER["REQUEST_METHOD"] == "GET", 'Fallo en peticion GET');
    check_empty($_GET['number_1'], $_GET['number_2']);
} else {
    echo '<h2>Fail request.</h2>';
}
?>

<?php       //  PHP 0.2
echo '<h1>PHP 0.2</h1><br/>';

$array = array();
foreach (range('a', 'z') as $letra) {
    echo $letra;
    array_push($array, $letra);
}
?>
<h2>El array contiene: <?php echo count($array); ?></h2>
<ul>
    <h2>Array Obverse</h2>
    <?php
    $concatStringObverse = '';
    foreach ($array as $key => $value) {
        $concatStringObverse = $concatStringObverse . $value;
        echo '<li>' . $concatStringObverse . '</li>';
    }
    ?>
</ul>
<ul>
    <h2>Array Reverse</h2>
    <?php
    $concatStringReverse = '';
    $count = count($array);
    // foreach (array_reverse($array) as $key => $value) {
    //     $concatStringReverse = $concatStringReverse . $value;
    //     echo '<li>' . $concatStringReverse . '</li>';
    // }

    for ($i = $count - 1; $i >= 0; $i--) {
        $concatStringReverse = $concatStringReverse . $array[$i];
        echo '<li>' . $concatStringReverse . '</li>';
    }
    ?>
</ul>


<?php
echo '<h1>PHP 0.3</h1><br/>';
function value_print($relleno, $i)          // Imprimo valor de celda
{
    if ($i <= $relleno) {
        echo '<td></td>';
    } else {
        echo '<td>' . ($i - $relleno) . '</td>';
    }
}
function print_calendar($relleno, $dias)    // Imprimo table y row
{
    echo '<table>
            <tr>
                <td>Lun</td>
                <td>Mar</td>
                <td>Mie</td>
                <td>Jue</td>
                <td>Vie</td>
                <td>Sab</td>
                <td>Dom</td>
            </tr>';

    for ($i = 1; $i <= ($dias + $relleno); $i++) {
        if (($i % 7) == 0) {
            value_print($relleno, $i);
            echo '</tr>';
        } else {
            value_print($relleno, $i);
        }
    }
    echo '</table>';
}
print_calendar(3, 31);
?>