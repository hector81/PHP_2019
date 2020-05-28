<?php
     $GLOBALS['conexion'] = mysqli_connect('localhost','root','','bbdd');
     $GLOBALS['conexion'] -> query('SET NAMES utf8');
?>
<!DOCTYPE html>
<html>
<head>
     <title>Ejemplo</title>
     <link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
     <div id="main">
<?php
     $consulta = 'SELECT * FROM clientes WHERE id = ' . (int)$_GET['id'];
     $resultado = $GLOBALS['conexion'] -> query($consulta);
     $cliente = $resultado -> fetch_array();
?>
          <table>
          <tr>
               <td>Nombre:</td>
               <td><?php echo htmlentities($cliente['nombre']); ?></td>
          </tr>
          <tr>
               <td>Apellidos:</td>
               <td><?php echo htmlentities($cliente['apellidos']); ?></td>
          </tr>
          </table>
     <div>
</body>
</html>


<?php
     $GLOBALS['conexion'] = mysqli_connect('localhost','root','','bbdd');
     $GLOBALS['conexion'] -> query('SET NAMES utf8');
     $consulta = 'SELECT * FROM clientes WHERE id = ' . (int)$_GET['id'];
     $resultado = $GLOBALS['conexion'] -> query($consulta);
     $cliente = $resultado -> fetch_array();
?>

Recuperar el código HTML de la plantilla con file_get_contents
Ir realizando los reemplazos necesarios con str_replace.