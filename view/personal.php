<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body >
    <table border="1px" style="text-align:center;margin:auto;padding:20px;margin-top:20px;">
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Ciudad</th>
      </tr>
      <?php
        foreach ($personas as $value) {

          echo "<tr>";
              echo "<td>".$value["nombre"]."</td>"
                  ."<td>".$value["edad"]."</td>"
                  ."<td>".$value["ciudad"]."</td>";
          echo "</tr>";
        }
       ?>
    </table>
  </body>
</html>
