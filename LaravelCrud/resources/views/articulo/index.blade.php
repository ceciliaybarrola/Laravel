@extends('layouts.plantillabase')
@section('contenido')
    <a class="btn btn-primary" href="articulos/create">CREAR</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th class="scope col">ID</th>
                <th class="scope col">Codigo</th>
                <th class="scope col">Descripcion</th>
                <th class="scope col">Cantidad</th>
                <th class="scope col">Precios</th>
                <th class="scope col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->codigo}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->cantidad}}</td>
                    <td>{{$articulo->precio}}</td>
                    <td>
                        <form action="{{ route ('articulos.destroy', $articulo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection