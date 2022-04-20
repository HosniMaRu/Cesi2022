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
    $gender = '';
    $codeType = '';
    $date = '';
    $permissions = '';
    $politicy = '';
    $save = false;
    $saveTOTAL = false;
    $save_name = false;
    $save_email = false;
    $save_pass = false;

    //  IMPORT DATA FROM FORM
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['fname'])) {
            $name = $_POST['fname'];
            $save_name = true;
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            $save_email = true;
        }
        if (!empty($_POST['password'])) {
            $pass = $_POST['password'];
            $save_pass = true;
        }
        if (!empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        if (!empty($_POST['codeType'])) {
            $codeType = $_POST['codeType'];
        }
        if (!empty($_POST['date'])) {
            $date = $_POST['date'];
        }
        if (!empty($_POST['permissions'])) {
            $permissions = $_POST['permissions'];
        } else {
            $permissions = false;
        }
        if (!empty($_POST['politicy'])) {
            $politicy = $_POST['politicy'];
        }
    }

    // ADD CONTENT TO FILE
    if ($save_name & $save_email & $save_pass) {
        $usuarios = new SimpleXMLElement('db.xml', 0, true);
        $nuevoUsuario = $usuarios->addChild('user');
        $nuevoUsuario->addChild('name', $name);
        $nuevoUsuario->addChild('email', $email);
        $nuevoUsuario->addChild('password', $pass);
        $nuevoUsuario->addChild('time', strtotime($date));
        $nuevoUsuario->addChild('gender', $gender);
        $nuevoUsuario->addChild('code_Type', $codeType);
        $nuevoUsuario->addChild('date', strtotime($date));
        $nuevoUsuario->addChild('permissions', $permissions);
        $nuevoUsuario->addChild('politicy', $politicy);

        $usuarios->saveXML('db.xml');
        $save = true;
    }

    if (!$save) {
        echo
        '<form method="post" action=".\index.php"  class="form">
                        <input type="hidden"  value="' . $name . '"  name="fname" >
                        <input type="hidden" value="' . $email . '"  name="email" >
                        <input type="hidden" value="' . $pass . '" name="password" >
                        <input type="hidden" value="' . $gender . '" name="gender" >
                        <input type="hidden" value="' . $codeType . '" name="' . $codeType . '" >
                        <input type="hidden" value="' . $date . '" name="date" >
                        <input type="hidden" value="' . $permissions . '" name="permissions" >
                        <input type="hidden" value="' . $politicy . '" name="politicy" >
                        <p>No ha indicado los datos, vuelva atras.</p>
                        <input  type="submit" >
                    </form>';
    } else {
        echo
        '<form method="post" action=".\table.php"  class="form">
                        <p>Acceso correcto.</p>
                        <input  type="submit" >
                    </form>';
    }
    ?>
    <ul class="form list">
        <li>
            <p class="property">Nombre: </p>
            <p class="value <?php echo $check = ($name) ?  'full' :  'requiered'; ?>">
                <?php echo $valueInput = ($name) ? $name : 'falta info*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Email: </p>
            <p class="value <?php echo $check = ($email) ?  'full' :  'requiered'; ?>">
                <?php echo $valueInput = ($email) ? $email : 'falta info*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Password: </p>
            <p class="value <?php echo $check = ($pass) ?  'full' :  'requiered'; ?>">
                <?php echo $valueInput = ($pass) ? $pass : 'falta info*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Gender: </p>
            <p class="value <?php echo $check = ($gender) ?  'full' :  'empty'; ?>">
                <?php echo $valueInput = ($gender) ? $gender : 'No requerido*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Code: </p>
            <p class="value <?php echo $check = ($codeType) ?  'full' :  'empty'; ?>">
                <?php echo $valueInput = ($codeType) ? $codeType : 'No requerido*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Date: </p>
            <p class="value <?php echo $check = ($date) ?  'full' :  'empty'; ?>">
                <?php echo $valueInput = ($date) ? $date : 'No requerido*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Permissions: </p>
            <p class="value <?php echo $check = ($permissions) ?  'full' :  'empty'; ?>">
                <?php echo $valueInput = ($permissions) ? $permissions : 'No requerido*'; ?>
            </p>
        </li>
        <li>
            <p class="property">Politicy: </p>
            <p class="value <?php echo $check = ($politicy) ?  'full' :  'empty'; ?>">
                <?php echo $valueInput = ($politicy) ? $politicy : 'No requerido*'; ?>
            </p>
        </li>
    </ul>
</body>

</html>