@extends ('layouts.vistapadre')

@section('contenido principal')
<h2>Contenido de la Vista 3</h2>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

@php
    echo 'esto es un texto de prueba';
@endphp
<ul>
    @for ($i = 0; $i < 5; $i++)
    <li>el valor de i es {{$i}}</li>
    @endfor
</ul>
<ul>
    @foreach ($users as $item)
    <li>El usuario es {{$item}}</li>
    @endforeach
</ul>
@if (count($users)===1)
<span class='badge bg-primary'> Hay un solo elemento en el array </span>
@elseif (count($users) > 1)
 <span class='badge bg-success'> Hay muchos elementos en el array </span>
@else
<span class='badge bg-danger'> No hay elementos</span>

@endif


@endsection