@extends('layouts.standard')
@section('pageTitle')Info Auto
@endsection

@section('main')
  <h1>Informazioni Auto</h1>
  <div class="carsList">
      <ul>
        <li><h3>{{$car->name}}</h3><h3>{{$car->model}}</h3></li>
        <li>
          <img src="{{$car->imgurl}}" alt="">
        </li>
        <li><p>Anno di produzione: {{$car->year}}</p></li>
        <li><p>Cilindrata: {{$car->displacement}} cc</p></li>
        <li><p>Velocità massima: {{$car->velmax}} km/h</p></li>
        <li><a href="{{route('cars.index')}}">Torna alla lista auto</a></li>
        <li><a href="{{route('cars.edit',$car->id)}}">Modifica</a></li>
      </ul>
  </div>
@endsection
