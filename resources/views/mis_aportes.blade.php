@extends('layouts.app')

@section('contenido')
<div class="row" id="table-head">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Listado de Mis Aportes</h4>
          <button class="btn btn-success text-right" onclick="descargar()">Exportar Excel</button>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Tipo de Pago</th>
                <th>Numero</th>
                <th>Banco</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($aportes as $aporte)
                <tr>
                    <td>{{$aporte->tipo_pago['value']}}</td>
                    <td>{{$aporte->cuenta}}</td>
                    <td>{{$aporte->banco['nombre']}}</td>
                    <td>{{$aporte->created_at}}</td>
                    <td>{{$aporte->total}}</td>
                    <td><span class="badge badge-glow bg-{{$aporte->estado['color']}}">{{$aporte->estado['value']}}</span></td>
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
    axios.get('/export_aportes_socios').then((response) => {
                var url = '/documentos_imagenes/aportes_excels/'+response.data;
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
