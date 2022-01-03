@extends('layouts.app')

@section('contenido')
<div class="row" id="table-head">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Listado de Mis Procesos</h4>
          <button class="btn btn-success text-right" onclick="descargar()">Exportar Excel</button>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Lugar</th>
                <th>Detalle</th>
                <th>Valor</th>
                <th>FechaREG</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($procesos as $proceso)
                <tr>
                    <td>{{$proceso->lugar}}</td>
                    <td>{{$proceso->detalle}}</td>
                    <td>{{$proceso->valor}}</td>
                    <td>{{$proceso->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
</div>

<script>
  function descargar() 
  {
    axios.get('/export_procesos_socios').then((response) => {
                var url = '/documentos_imagenes/procesos_excels/'+response.data;
                axios({
                    url: url,
                    method: 'GET',
                    responseType: 'blob',
                }).then((response) => {
                  console.log(response.config.url);
                  var url = response.config.url.split('/');
                  var nombre = url[3];
                     var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                     var fileLink = document.createElement('a');
   
                     fileLink.href = fileURL;
                     fileLink.setAttribute('download', nombre);
                     document.body.appendChild(fileLink);
   
                     fileLink.click();
                });
    })
  }
</script>
@endsection
