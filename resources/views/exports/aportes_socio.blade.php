<table class="table">
    <thead class="table-dark">
      <tr>
        @if($socios == true)
        <th>Cedula</th>
        <th>Socio</th>
        @endif
        <th>Tipo de Pago</th>
        <th>Numero</th>
        <th>Banco</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Estado</th>
        @if($socios == true)
        <th>Creador Por</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($aportes as $aporte)
        <tr>
            @if($socios == true)
            <th>{{$aporte->socio['documento']}}</th>
            <th>{{$aporte->socio['nombres']}}</th>
            @endif
            <td>{{$aporte->tipo_pago['value']}}</td>
            <td>{{$aporte->cuenta}}</td>
            <td>{{$aporte->banco['nombre']}}</td>
            <td>{{$aporte->created_at}}</td>
            <td>{{$aporte->total}}</td>
            <td><span class="text-{{$aporte->estado['color']}}">{{$aporte->estado['value']}}</span></td>
            @if($socios == true)
            <th>{{$aporte->creador['name']}} ({{$aporte->creador['user']}})</th>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
