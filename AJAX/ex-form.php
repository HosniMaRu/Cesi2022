<?php
//  Switch actions API.
function actionAPI()
{
    switch ($_POST['action']) {
        case 'succesfull':
            printSuccessInformation();
            break;
        case 'create':
            if (checkConnection()) {
                createDDBB();
                addTableToDDBB();
                if (checkEmail()) {
                    addTableDataToDDBB($_POST['email'], $_POST['name'], $_POST['phone'], $_POST['password']);
                } else {
                    echo $_POST['email'] . ' Already exists' . '<br>';
                }
            }
            break;
        case 'readUser':
            if (checkConnection()) {
                createDDBB();
                addTableToDDBB();
                if (!checkEmail()) {
                    getUserData();
                }
            }
            break;
        case 'singIn':
            if (checkConnection()) {
                signInUser($_POST['email'], $_POST['password']);
            }
            break;
        default:
            echo 'Action ' . $_POST['action'] . ' not found.';
            break;
    }
}
//  Comprobacion de conexion a la bbdd.
function checkConnection()
{
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) {
        return false;
    } else {
        return true;
    }
    $conn->close();
}
//  Creacion de base de datos si no existe.
function createDDBB()
{
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'CREATE DATABASE IF NOT EXISTS PBD';
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}
//  Añadir tabla a la bbdd si no existe.
function addTableToDDBB()
{
    $conn = new mysqli('localhost', 'root', '', 'PBD');
    $sql = 'CREATE TABLE IF NOT EXISTS usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, password CHAR(32) CHARACTER SET "latin1" NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}
//  Creacion de usuario.
function addTableDataToDDBB($email, $name, $phone, $password)
{
    $conn = new mysqli('localhost', 'root', '', 'PBD');
    $sql = "INSERT INTO usuarios (email, nombre, phone, password) VALUES ('$email',' $name', '$phone', '" . md5($password) . "');";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "<b>---- CREATE USER ----</b>" . '<br>';
        echo '<b>ID: </b>' . $last_id . '<br>';
        echo "<b>EMAIL: </b>" . $_POST['email'] . '<br>';
        echo "<b>NAME: </b>" . $_POST['name'] . '<br>';
        echo "<b>PHONE: </b>" . $_POST['phone'] . '<br>';
    } else {
        echo 'ERROR: insert table "usuarios"' . $conn->error . '<br>';
    }
    $conn->close();
}
//  Eliminar si existe usuario
function deleteDDB()
{
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'DROP DATABASE IF EXISTS PBD';
    if ($conn->query($sql) === TRUE) {
        echo 'drop database "PBD"<br>';
    } else {
        echo 'ERROR: drop database "PBD"' . $conn->error + '<br>';
    }
    $conn->close();
}
//  Comprobar si existe email
function checkEmail()
{
    $email = $_POST['email'];
    $conn = new mysqli("localhost", "root", "", "PBD");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
    $conn->close();
}
//  Obtener informacion usuraio
function getUserData()
{
    $email = $_POST['email'];
    $conn = new mysqli("localhost", "root", "", "PBD");
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, json_encode($row));
        }
        echo json_encode(($array));
    }
    $conn->close();
}
//  Sing in usuario
function signInUser($email, $password)
{
    $conn = new mysqli('localhost', 'root', '', 'pbd');
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "' && password='" . md5($password) . "' ;";
    echo md5($password);
    $result = $conn->query($sql);
    print_r($result);
    if ($result->num_rows == 1) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, json_encode($row));
        }
        echo json_encode(($array));
    } else {
        echo $sql;
    }
    $conn->close();
}
function printSuccessInformation()
{
    $conn = new mysqli('localhost', 'root', '');
    if (checkConnection()) {
        echo 'Connection succefully';
        echo '<br>';
    } else {
        die('Connection failed: <br>' . $conn->connect_error);
        echo '<br>';
    }
    if (createDDBB()) {
        echo 'Database "PBD"';
        echo '<br>';
    } else {
        echo 'ERROR: create database "PBD"<br>' . $conn->error;
        echo '<br>';
    }
    if (addTableToDDBB()) {
        echo 'Usuarios table in "PBD"<br><br>';
    } else {
        echo 'ERROR: create usuarios table in "PBD"' . $conn->error . '<br>';
    }
    if (!checkEmail()) {
        echo $_POST['email'] . ' Already exists' . '<br>';
    }
    $conn->close();
}
actionAPI();
