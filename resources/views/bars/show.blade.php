@extends('layout.layout')

@section('title','Ver Bar')

@section('content')
        <h1 class="text-center">Ver bar</h1>
        <div class="row d-flex justify-content-center">
       
        <div class="col-3 py-2 ">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$bar[1]}}</h5>
                <p class="card-text">{{$bar[2]}}</p>
                <a href="{{route('bars.show',$bar[0])}}" class="btn btn-primary">Ver</a>
            </div>
        </div>
        </div>

        </div>
        <div class="text-center">
        <a href="{{route('bars.index')}}" class="btn btn-primary">Volver</a>
        </div>
@endsection