<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Hosni" />
        <meta name="description" content="" />
        <title></title>
        <link rel="stylesheet" href="./globals_POST.css" />
        <link rel="stylesheet" href="../../menu/menu.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function() {
                $("#includedContent").load("/menu/menu.html");
            });
        </script>
    </head>
    <body>
        <div id="includedContent"></div>
        <div class="main">
            <div class="form-container">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-content">
                        <label for="fname">First Name: </label>
                        <input type="text" placeholder="First Name" name="fname">
                    </div>
                    <div class="form-content">
                        <label for="lname">Last Name: </label>
                        <input type="text" placeholder="Last Name" name="lname">
                    </div>
                    <div class="form-content">
                        <label for="age">Age: </label>
                        <input type="number" placeholder="Age" name="age">
                    </div>
                    <input class="form-content button" type="submit">
                </form>
            </div>

            <?php
                echo '<div>';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // collect value of input field
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $age = $_POST['age'];

                    echo '<p class="request-content">';
                    if (empty($fname)) {
                        echo "Name is empty";
                    } else {
                        echo 'First name: '.$fname;
                    }
                    echo '</p>';
                    
                    echo '<p class="request-content">';
                    if (empty($lname)) {
                        echo "Last name is empty";
                    } else {
                        echo 'Last name: '.$lname;
                    }
                    echo '</p>';
                    
                    echo '<p class="request-content">';
                    if (empty($age)) {
                        echo "Age is empty";
                    } else {
                        echo 'Age: '.$age;
                    }
                    echo '</p>';
                }
                echo '</div>';        
            ?>
        </div>
    </body>
</html>