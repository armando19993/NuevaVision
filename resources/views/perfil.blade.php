@extends('layouts.app')

@section('contenido')
<div class="card">
    <div class="card-header border-bottom">
      <h4 class="card-title">Detalles del perfil</h4>
    </div>
    <form class="validate-form mt-2 pt-50" novalidate="novalidate">
    <div class="card-body py-2 my-25">
      <!-- header section -->
      <div class="d-flex">
        <a href="#" class="me-25">
          <img src="/documentos_imagenes/{{$socio->foto}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100">
        </a>
        <!-- upload and reset button -->
        <div class="d-flex align-items-end mt-75 ms-1">
          <div>
            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75 waves-effect waves-float waves-light">Subir Nueva Foto</label>
            <input type="file" id="account-upload" hidden="" accept="image/*">
          </div>
        </div>
        <!--/ upload and reset button -->
      </div>
      <!--/ header section -->

      <!-- form -->
      
        <div class="row">
          <div class="col-12 col-sm-6 mb-1">
            <label class="form-label" for="accountFirstName">Nombre</label>
            <input type="text" class="form-control" name="nombres" placeholder="John"  value="{{$socio->nombres}}">
          </div>

          <div class="col-12 col-sm-6 mb-1">
            <label class="form-label" for="accountFirstName">Nombre</label>
            <input type="text" class="form-control" name="nombres" placeholder="John"  value="{{$socio->nombres}}">
          </div>
          
         
        
          <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary mt-1 me-1 waves-effect waves-float waves-light">Guardar</button>
          </div>
        </div>
      </form>
      <!--/ form -->
    </div>

  </div>
@endsection
