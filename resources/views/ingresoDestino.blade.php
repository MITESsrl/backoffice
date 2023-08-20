<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ingrese datos:</h1>  
   <div class="formulario">
    <form action="/destino" method="POST">
        @csrf 
        <label for="matricula">Matricula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <label for="id">Id Almacen:</label>
        <input type="text" id="id" name="id" required><br><br>

        <input type="submit" value="Enviar">

    </form>

   </div>
   @isset($mensaje)
    <p>{{$mensaje}}</p>
    @endisset

</body>
</html>