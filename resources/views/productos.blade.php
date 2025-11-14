<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>

    <ul>
        @foreach($productos as $producto)
            <li>
                <strong>{{ $producto->nombre }}</strong>  
                <br>
                {{ $producto->descripcion }}  
                <br>
                Precio: ${{ $producto->precio }}
            </li>
        @endforeach
    </ul>

</body>
</html>
