<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ingrese producto:</h1>  
   <div class="formulario">
    <form action="/producto" method="POST">
        @csrf 
        <label for="codigo">Codigo:</label>
        <input type="numb" id="codigo" name="codigo" required><br><br>

        <label for="id_lote">Id Lote:</label>
        <input type="numb" id="id_lote" name="id_lote" required><br><br>

        <input type="submit" value="Enviar">

    </form>

   </div>
   @isset($mensaje)
    <p>{{$mensaje}}</p>
    @endisset
</body>
</html>