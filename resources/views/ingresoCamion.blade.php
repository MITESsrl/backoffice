<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Camion</title>
</head>
<body>
 <h1>Ingrese los datos</h1>  
   <div class="formulario">
    <form action="/camiones" method="POST">
        @csrf 
        <label for="matricula_camion">Matricula:</label>
        <input type="text" id="matricula_camion" name="matricula_camion" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="cantMaxProductos">Cantidad máxima de productos:</label>
        <input type="number" id="cantMaxProductos" name="cantMaxProductos" required><br><br>

        <input type="submit" value="Enviar">

    </form>

   </div>
   @isset($mensaje)
    <p>{{$mensaje}}</p>
    @endisset

</body>
</html>