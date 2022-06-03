<?php
// // print_r($_REQUEST);
// // echo $_GET['nombre'];
// // echo $_POST['nombre'];
// $total = $_GET['numero1'] + $_GET['numero2'];
// echo json_encode(array('nombre' => $_GET['nombre'], 'edad' => $_GET['edad'], 'total' => $total));
switch ($_POST['queHacer']) {
    case 1:
        peticion1();
        break;
    case 2:
        peticion2();
        break;
    case 3:
        // peticion3();
        deleteAndCreateDDBB();
        break;
    case 4:
        insertarDatos($_POST['email'], $_POST['nombre'], $_POST['phone']);
        break;
    case 5:
        getData();
        break;
    case 6:
        getDataParam($_POST['email']);
        break;
    default:
        echo 'default';
        break;
}
function peticion1()
{
    $total = $_POST['numero1'] + $_POST['numero2'];
    echo json_encode(array('nombre' => $_POST['nombre'], 'edad' => $_POST['edad'], 'total' => $total));
};
function peticion2()
{
    echo 'hola';
};

function peticion3()
{
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    };
    echo 'Connected succefully';
    $conn->close();
}
function deleteAndCreateDDBB()
{
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    };
    deleteDDB();
    createDDBB();
    addTableToDDBB();
    addTableDataToDDBB();
}
function deleteDDB()
{
    //ELIMINAR DDBB SI EXISTE
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'DROP DATABASE IF EXISTS cesi';
    if ($conn->query($sql) === TRUE) {
        echo 'drop database "cesi"<br>';
    } else {
        echo 'ERROR: drop database "cesi"' . $conn->error + '<br>';
    }
}
function createDDBB()
{
    //CREAR DDBB
    $conn = new mysqli('localhost', 'root', '');
    $sql = 'CREATE DATABASE cesi';
    if ($conn->query($sql) === TRUE) {
        echo 'create database "cesi"<br>';
    } else {
        echo 'ERROR: create database "cesi"' . $conn->error + '<br>';
    }

    $conn->close();
}
function addTableToDDBB()
{
    //ADD TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'cesi');
    $sql = 'CREATE TABLE usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
    if ($conn->query($sql) === TRUE) {
        echo 'create usuarios "cesi"<br>';
    } else {
        echo 'ERROR: create usuarios "cesi"' . $conn->error + '<br>';
    }
    $conn->close();
}
function addTableDataToDDBB()
{
    //ADD DATA TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'cesi');
    $sql = "INSERT INTO usuarios (email, nombre,phone) VALUES ('hosni.marco@gmail.com', 'Hosni', 654987321);";
    $sql .= " INSERT INTO usuarios (email, nombre,phone) VALUES ('hosni.marco2@gmail.com', 'Hosni2', 654987328);";
    if ($conn->multi_query($sql) === TRUE) {
        echo 'insert table "usuarios"<br>';
        $last_id = $conn->insert_id;
        echo 'ID: ' . $last_id . '<br>';
    } else {
        echo 'ERROR: insert table "cesi"' . $conn->error . '<br>';
    }
    $conn->close();
}


function insertarDatos($email, $nombre, $phone)
{
    //ADD DATA TABLE TO DDBB
    $conn = new mysqli('localhost', 'root', '', 'cesi');
    $sql = "INSERT INTO usuarios (email, nombre,phone) VALUES ('" . $email . "', '" . $nombre . "', " . $phone . ");";
    if ($conn->query($sql) === TRUE) {
        echo 'insert table "usuarios"<br>';
        $last_id = $conn->insert_id;
        echo 'ID: ' . $last_id;
    } else {
        echo 'ERROR: insert table "cesi"' . $conn->error . '<br>';
    }
    $conn->close();
}
function getData()
{
    $conn = new mysqli('localhost', 'root', '', 'cesi');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    };
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<b>ID: </b>' . $row['id'] . '<br>' . '<b>NOMBRE: </b>' . $row['nombre'] . '<br>' . '<b>EMAIL: </b>' . $row['email'] . '<br>' . '<b>PHONE: </b>' . $row['phone'] . '<br>' . '<b>FECHA: </b>' . $row['reg_date'] . '<br><br>';
        }
    } else {
        echo 'No results';
    }
    $conn->close();
}
function getDataParam($email)
{
    $conn = new mysqli('localhost', 'root', '', 'cesi');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    };
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        echo json_encode($array);
    } else {
        echo 'No results';
    }
    $conn->close();
}
