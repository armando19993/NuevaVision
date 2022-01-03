<table class="table">
    <thead class="table-dark">
      <tr>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Movil</th>
        <th>Correo</th>
        <th>Cuenta</th>
        <th>Banco</th>
        <th>Convenio</th>
        <th>Nombres Referencia</th>
        <th>Movil Referencia</th>
        <th>Fuerza</th>
        <th>Estado</th>
        <th>Pago</th>
        <th>Saldo</th>
        <th>Observacion</th>
        <th>Mies</th>
        <th>Mt</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($socios as $socio)
        <tr>
            <td>{{$socio->documento}}</td>
            <td>{{$socio->nombres}}</td>
            <td>{{$socio->direccion}}</td>
            <td>{{$socio->telefono}}</td>
            <td>{{$socio->movil}}</td>
            <td>{{$socio->correo}}</td>
            <td>{{$socio->cuenta}}</td>
            <td>{{$socio->banco['nombre']}}</td>
            <td>@if($socio->convenio == 1) Si @else No @endif</td>
            <td>{{$socio->nombres_referencia}}</td>
            <td>{{$socio->movil_referencia}}</td>
            <td>{{$socio->fuerza['value']}}</td>
            <td>{{$socio->estado['value']}}</td>
            <td>{{$socio->pago['value']}}</td>
            <td>$ {{$socio->saldo}}</td>
            <td>{{$socio->observacion}}</td>
            <td>@if($socio->mies == true) Si @else No @endif</td>
            <td>@if($socio->mt == true) Si @else No @endif</td>
        </tr>
        @endforeach
    </tbody>
</table>
