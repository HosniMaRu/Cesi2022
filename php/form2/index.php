<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $("#includedContent").load("/menu/menu.html");
        });
    </script>
    <link rel="stylesheet" href="../../menu/menu.css" />
</head>

<body>
    <div id="includedContent"></div>
    <div class="main">
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
            if (!empty($_POST['html'])) {
                $codeType = $_POST['html'];
            } else if (!empty($_POST['css'])) {
                $codeType = $_POST['css'];
            } else if (!empty($_POST['php'])) {
                $codeType = $_POST['php'];
            } else if (!empty($_POST['js'])) {
                $codeType = $_POST['js'];
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
        ?>
        <form method="post" action=".\save.php">
            <div class="center">
                <label for="fname">Name:</label>
                <input type="text" minlength="2" value="<?php echo $name ?>" placeholder="Your name.." name="fname" class="input_text">
            </div>
            <div class="center">
                <label for="email">Email:</label>
                <input type="email" value="<?php echo $email ?>" name="email" placeholder="Your email.." class="input_text">
            </div>
            <div class="center">
                <label for="password">Password:</label>
                <input type="password" value="<?php echo $pass ?>" name="password" placeholder="Your password.." class="input_text">

            </div>
            <div class="center gender">
                <?php
                $genderWoman = ($gender == 'mujer') ?   'selected' : '';
                $genderMan = ($gender == 'hombre') ?   'selected' : '';
                $genderStupid = ($gender == 'imbecil') ?   'selected' : '';
                $genderNone = (!$gender) ? 'selected' : '';
                ?>
                <label for="gender">Gender: </label>
                <select class="form-control" name="gender" id="gender">
                    <option value="mujer" <?php echo $genderWoman ?>>Mujer</option>
                    <option value="hombre" <?php echo $genderMan ?>>Hombre</option>
                    <option value="imbecil" <?php echo $genderStupid ?>>Imbecil</option>
                    <option disabled <?php echo $genderNone ?>></option>
                </select>
            </div>
            <div class="check_date">
                <div class="center left" value="<?php echo $gender ?>">
                    <label for="codeType">
                        <div>
                            <label for="html">HTML</label>
                            <input class="ceckbox_input" type="radio" id="html" name="codeType" value="html" <?php
                                                                                                                echo $checked = ($codeType == 'html') ? 'checked' : '';
                                                                                                                ?>>
                        </div>
                        <div>
                            <label for="css">CSS</label>
                            <input class="ceckbox_input" type="radio" id="css" name="codeType" value="css" <?php
                                                                                                            echo $checked = ($codeType == 'css') ? 'checked' : '';
                                                                                                            ?>>
                        </div>
                        <div>
                            <label for="php">PHP</label>
                            <input class="ceckbox_input" type="radio" id="php" name="codeType" value="php" <?php
                                                                                                            echo $checked = ($codeType == 'php') ? 'checked' : '';
                                                                                                            ?>>
                        </div>
                        <div>
                            <label for="js">JS</label>
                            <input class="ceckbox_input" type="radio" id="js" name="codeType" value="JS" <?php
                                                                                                            echo $checked = ($codeType == 'js') ? 'checked' : '';
                                                                                                            ?>>
                        </div>
                    </label>
                </div>
                <div class="right">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" min='2022-03-24' max='2022-03-31' value='<?php echo $date ?>'>
                </div>
            </div>
            <div class="center checkbox">
                <label for="permissions">Recibir informacion</label>
                <input type="checkbox" id="permissions" name="permissions" value="true" <?php
                                                                                        echo $checked = ($permissions == true) ? 'checked' : '';
                                                                                        ?>>
            </div>
            <div class="center checkbox">
                <label for="politicy"> Aceptar terminos y condiciones</label>
                <input type="checkbox" id="politicy" name="politicy" value="true" required>
            </div>
            <div class="submit">
                <input type="submit">
            </div>
        </form>
</body>

</html>