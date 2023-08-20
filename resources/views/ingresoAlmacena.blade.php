<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenar Productos</title>
</head>
<body>
<h1>Ingrese datos:</h1>  
   <div class="formulario">
    <form action="/almacenar" method="POST">
        @csrf 
        <label for="id">Id Almacen:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="codigo">Id Producto:</label>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <input type="submit" value="Enviar">

    </form>

   </div>
   @isset($mensaje)
    <p>{{$mensaje}}</p>
    @endisset
</body>
</html>