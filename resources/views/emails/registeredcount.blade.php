@extends('layouts.app')

@section('content')

@include('layouts.master')

<div>
    El número total de usuarios registrado el día de hoy es: {{ $count }}
</div>

@endsection
