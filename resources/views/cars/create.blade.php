<h1>Crea un nuovo record Auto</h1>

<div class="error">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif
</div>

<form action="{{route('cars.store')}}" method="post">
  @csrf
  @method('POST')
  <div class="">
    <label>Nome casa produttrice</label>
    <input type="text" name="name" value="{{old('name')}}">
  </div>

  <div class="">
    <label>Nome modello</label>
    <input type="text" name="model" value="{{old('model')}}">
  </div>

  <div class="">
    <label>Url all'immagine 128x128</label>
    <input type="text" name="imgurl" value="{{old('imgurl')}}">
  </div>

  <div class="">
    <label>Anno di produzione</label>
    <input type="number" name="year" value="{{old('year')}}">
  </div>

  <div class="">
    <label>Cilindrata in cc</label>
    <input type="number" name="displacement" value="{{old('displacement')}}">
  </div>

  <div class="">
    <label>Velocità massima</label>
    <input type="number" name="velmax" value="{{old('velmax')}}">
  </div>

  <div class="">
    <input type="submit" value="Salva">
  </div>

</form>
