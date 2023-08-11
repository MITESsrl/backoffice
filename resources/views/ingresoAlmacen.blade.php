<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Almacen</title>
</head>
<body>
<h1>Ingrese los datos</h1>  
   <div class="formulario">
    <form action="/almacenes" method="POST">
        @csrf 
 <label for="departamento">Elige el departamento</label>       
<select name="departamento" id="departamento">
    <option value="artigas">Artigas</option>
    <option value="canelones">Canelones</option>
    <option value="cerro largo">Cerro Largo</option>
    <option value="colonia">Colonia</option>
    <option value="durazno">Durazno</option>
    <option value="flores">Flores</option>
    <option value="florida">Florida</option>
    <option value="lavalleja">Lavalleja</option>
    <option value="maldonado">Maldonado</option>
    <option value="montevideo">Montevideo</option>
    <option value="paysandu">Paysandú</option>
    <option value="rio negro">Río Negro</option>
    <option value="rivera">Rivera</option>
    <option value="rocha">Rocha</option>
    <option value="salto">Salto</option>
    <option value="san jose">San José</option>
    <option value="soriano">Soriano</option>
    <option value="tacuarembo">Tacuarembó</option>
    <option value="treinta y tres">Treinta y Tres</option>
</select> <br><br>

        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <input type="submit" value="Enviar">

    </form>

   </div>
   @isset($mensaje)
    <p>{{$mensaje}}</p>
    @endisset

    
</body>
</html>