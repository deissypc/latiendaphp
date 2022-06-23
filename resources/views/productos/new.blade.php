@extends('layouts.menu')
@section('contenido')
@if(session('mensajito'))
<div class="row">
    <p>{{session('mensajito') }}</p>
</div>
@endif
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
      <div class="container">
        
<div class="row">
    <h1 class=" blue-text text-darken-3">nuevo producto:</h1>
</div>
<div class="row">
    <form
     action="{{route('productos.store')}}" 
     method="POST"
     class="col s8"
     enctype="multipart/form-data"
     >
     @csrf
     <div class="row">
         <div class="col s8 input-field">
         <i class="material-icons prefix">comment</i>
             <input 
                type="text"
                id="nombre"
                name="nombre"
                class="validate"
                placeholder="nombre de producto"/>
             <label for="nombre">nombre del producto</label>
         <strong>{{$errors->first('nombre')}}</strong>
            </div>
     </div>
     <div class="row">
        <div class="col s8 input-field">
        <i class="material-icons prefix">mode_edit</i>
        <textarea
          name="desc"
          id="descripcion" 
          class="materialize-textarea"></textarea>
          <label for="des">descripcion</label>
          <strong>{{$errors->first('desc')}}</strong>
     </div>
   </div>
   <div class="row">
       <div class="col s8 input-field">
       <i class="material-icons prefix">monetization_on</i>
       <input
          type="text"
          id="precio"
          name="precio"
          class="validate"/>
          <label for="precio">precio</label>
          <strong>{{$errors->first('precio')}}</strong>
       </div>
    </div>
    <div class="row">
       <div class="col s8 file-field input-field">
       <div class="btn deep-purple darken-3">
       <span>imagenes del producto</span>
       <input type="file" name="imagen">
       </div>
       <div class="file-path-wrapper">
       <i class="material-icons prefix">photo_camera</i>
           <input type="text" class="file-path validate">
           <strong>{{$errors->first('imagen')}}</strong>

           </div>
           </div>
       
    </div>
    <div class="row">
        <div class="col s8 imput-field">
        <select name="marca" id="marca">
                <option value="">Seleccione marca</option>
                @foreach($marcas as $marca)
                <option value="{{ $marca->id}}">
                    {{$marca->nombre}}
                </option>
                @endforeach
            </select>
            <label>seleccione marca</label>
            <strong>{{$errors->first('categoria')}}</strong>
        </div>
    </div>

    
    <div class="row">
    <div class="col s8 imput-field">
            <select name="categoria" id="categoria">
                <option value="">Seleccione categoria</option>
                @foreach($categorias as $categoria)
                <option  value="{{ $categoria->id}}">
                    {{$categoria->nombre}}
                </option>
                @endforeach
            </select>
            <label>seleccione categoria</label>
            <strong>{{$errors->first('categoria')}}</strong>
        </div>
    </div>

    <div class="row">
    <button class="btn deep-purple darken-3" type="submit" name="action">Guardar producto<i class="material-icons right">send</i>
  </button>
    </div>
  </form>
</div>
</div>
    </body>
@endsection