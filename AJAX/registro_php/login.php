<?php
date_default_timezone_set('Europe/Madrid');
define("RECAPTCHA_V3_SECRET_KEY", '6LemHlMgAAAAAL9dq7CKAZhtH-VGp_-460Em0rQU');
$myObj = new stdClass();

switch ($_POST['api']) {
    case "loginUser":
        checkCaptcha(sanitize($_POST['captcha']), $myObj);
        if (isset($myObj->success)) {
            loginUser(sanitize($_POST['email']), sanitize($_POST['password']), $myObj);
        }
        echo json_encode($myObj);
        break;
    default:
        $myObj->error = "error en el switchCase";
        break;
}



function sanitize($texto)
{
    return htmlentities(strip_tags($texto), ENT_QUOTES, 'UTF-8');
}
function checkCaptcha($captcha, $myObj)
{
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_V3_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    $response = json_decode($response);
    if ($response->success === false) {
        //Do something with error
        $myObj->error = "no recaptcha.";
    } else {
        if ($response->success == true && $response->score > 0.5) {
            // echo 'correct'; passar el objeto del usuario
            $myObj->success = true;
        } else if ($response->success == true && $response->score <= 0.5) {
            $myObj->error = "Human?<br>";
        } else {
            $myObj->error = "NO<br>";
        }
    }
}
function loginUser($email, $password, $myObj)
{
    $usuario = new stdClass();
    $conn = new mysqli("sql4.freemysqlhosting.net", "sql4499632", "SqpEq4ZEvZ", "sql4499632");
    $sql = "SELECT nombre FROM usuarios WHERE email='" . $email . "' && password='" . md5($password) . "' ;";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            // echo 'asd';
            $usuario->email = $email;
            $usuario->nombre = $row['nombre'];

            $usuario->token = md5(time() . "-" . $usuario->email);
            $sql_a = "UPDATE usuarios SET token='" . $usuario->token . "' WHERE email='" . $email . "' ;";
            $result_a = $conn->query($sql_a);

            $myObj->usuario = json_encode($usuario);
            //$myObj->error = null;
            break;
        }
    } else {
        echo "Error: user not found.";
    }
    $conn->close();
}
