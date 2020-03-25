@extends('layouts.master')

@section('content')

<!--     Show: <?php echo $id ?> -->

    <div class="row">
​
    <div class="col-sm-4">
​
        <img src="{{$pelicula['poster']}}" style="height: 200px"/>
​
    </div>
    <div class="col-sm-8">
​
        <h1 style="min-height: 50px; margin: 5px 0px 10px 0px">
        	{{$pelicula->title}}
        </h1>

        <h2 style="min-height: 50px; margin: 0">
        	Año: {{$pelicula->year}}
        </h2>

        <h2 style="min-height: 50px; margin: 0">
        	Director: {{$pelicula->director}}
        </h2>

        <p> Resumen: {{$pelicula->synopsis}} </p>
​
    </div>
</div>

	@if($pelicula->rented == false )
	    <button type="button" class="btn btn-primary">Alquilar película</button>
	@else
	    <button type="button" class="btn btn-danger">Devolver película</button>
	@endif

<button type="button" class="btn btn-warning"><a href="{{url('/catalog/edit/'.$id ?? '' ?? '')}}">Editar película</button>

@stop