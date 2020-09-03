@extends('layouts.standard')
@section('pageTitle')Lista Auto
@endsection

@section('main')
<header>
  <nav id="navbar">
    <a class="btnCrea" href="{{route('cars.create')}}">Crea un nuovo record Auto</a>
  </nav>
</header>
<main>
  <h1>Lista Auto</h1>
  <div class="carsList">
    @foreach ($cars as $car)
      <ul>
        <li><h3>{{$car->name}}</h3><h3>{{$car->model}}</h3></li>
        <li>
          <img src="{{$car->imgurl}}" alt="">
        </li>
        <li><a href="{{route('cars.show',$car->id)}}">Informazioni <i class="fas fa-info-circle"></i></a></li>
        <li><a href="{{route('cars.edit',$car->id)}}">Modifica <i class="fas fa-pen-alt"></i></a></li>
        <li>
          <form action="{{route('cars.destroy',$car->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina">
          </form>
        </li>
      </ul>
    @endforeach
  </div>
</main>
@endsection
