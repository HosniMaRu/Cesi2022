<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../menu/menu.css" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(function () {
        $("#includedContent").load("../../menu/menu.html");
      });
    </script>
  </head>
  <body>
    <div id="includedContent"></div>
    <div class="main">
      <div class="button_min_width">
        <input class="left" type="button" value="Accept" />
        <input class="right" type="button" value="Back" />
      </div>

      <form action="./sender.php" method="get" target="_blank">
        <fieldset>
          <legend>Informacion buttons</legend>
          <label for=""></label>
          <p>Nombre completo: <input type="text" name="nombrecompleto" autocomplete="on"></p>
          <p>Direccion: <input type="password" name="direccion"></p>
          <p>Telefono: <input type="tel" name="nombrecompleto"></p>
          <p>Button: <input type="button" name="button" value="button"></p>
          <p>checkbox: <input type="checkbox" name="checkbox"></p>
          <p>email pattern: <input type="email" name="mail" id="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></p>
          <textarea name="textarea" id="textarea" rows="5" cols="50" maxlength="20" placeholder="input textarea"></textarea><br />
          <select multiple>
            <optgroup label="Nombres"> 
              <option value="juan">juan</option>
              <option value="jose">jose</option>
              <option value="pedro">pedro</option>
            </optgroup>
          </select>
          <input type="submit" value="submit">
        </fieldset>
      </form>
    </div>
  </body>
</html>
