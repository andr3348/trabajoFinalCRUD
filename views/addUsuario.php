<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="?action=addUsuario" method="POST">
        <label for="nombre">NOMBRE:</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" name="dni" id="dni"><br><br>

        <label for="correo">CORREO:</label><br>
        <input type="text" name="correo" id="correo"><br><br>

        <label for="pass">CONTRASEÑA:</label><br>
        <input type="text" name="pass" id="pass"><br><br>

        <label for="tipo">TIPO DE USUARIO:</label> <br>
        <input type="text" name="tipo" id="tipo"> <br><br>
        <button type="submit">Crear usuario</button>
    </form>
</body>

</html>