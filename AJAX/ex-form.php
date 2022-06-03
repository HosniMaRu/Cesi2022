<?php function deleteAndCreateDDBB()
{
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    };
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    // deleteDDB();
    // createDDBB();
    // addTableToDDBB();
    checkEmail('test1@gmail.com');
    checkEmail('test1Z@gmail.com');
    autogenerateTableDataToDDBB();
    addTableDataToDDBB($email, $name, $phone);
}

function createDDBB()
{
    //CREAR DDBB
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'CREATE DATABASE IF NOT EXISTS PBD';
    if ($conn->query($sql) === TRUE) {
        echo 'create database "PBD"<br>';
    } else {
        echo 'ERROR: create database "PBD"' . $conn->error + '<br>';
    }

    $conn->close();
}
function addTableToDDBB()
{
    //ADD TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'PBD');
    $sql = 'CREATE TABLE usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
    if ($conn->query($sql) === TRUE) {
        echo 'create usuarios table in "PBD"<br>';
    } else {
        echo 'ERROR: create usuarios table in "PBD"' . $conn->error . '<br>';
    }
    $conn->close();
}
function checkEmail($email)
{
    $conn = new mysqli("localhost", "root", "", "PBD");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    echo '----->' . $sql . '<br>';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo $email . ' Already exists' . '<br>';
    } else {
        echo "Create user" . '<br>';
    }

    $conn->close();
}
function addTableDataToDDBB($email, $name, $phone)
{
    //ADD DATA TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'PBD');
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    if ($conn->query($sql) === TRUE) {
        echo 'shit <br>';
    } else {
        $sql = "INSERT INTO usuarios (email, nombre, phone) VALUES ('$email',' $name', '$phone');";
        if ($conn->query($sql) === TRUE) {
            echo 'insert table "usuarios"<br>';
            $last_id = $conn->insert_id;
            echo 'ID: ' . $last_id . '<br>';
        } else {
            echo 'ERROR: insert table "usuarios"' . $conn->error . '<br>';
        }
    }
    $conn->close();
}
function autogenerateTableDataToDDBB()
{
    //ADD DATA TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'PBD');
    $sql = "";
    for ($i = 1; $i < 5; $i++) {
        $sql .= "INSERT INTO usuarios (email, nombre, phone) VALUES ('test$i@gmail.com', 'name$i', '$i');";
    }
    if ($conn->multi_query($sql) === TRUE) {
        echo 'insert table "usuarios"<br>';
        $last_id = $conn->insert_id;
        echo 'ID: ' . $last_id . '<br>';
    } else {
        echo 'ERROR: insert table "usuarios"' . $conn->error . '<br>';
    }
    $conn->close();
}
function deleteDDB()
{
    //ELIMINAR DDBB SI EXISTE
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'DROP DATABASE IF EXISTS PBD';
    if ($conn->query($sql) === TRUE) {
        echo 'drop database "PBD"<br>';
    } else {
        echo 'ERROR: drop database "PBD"' . $conn->error + '<br>';
    }
}
deleteAndCreateDDBB();
