<table class="table">
    <thead class="table-dark">
      <tr>
        @if($socios == true)
        <th>Cedula</th>
        <th>Socio</th>
        @endif
        <th>Lugar</th>
        <th>Detalle</th>
        <th>Valor</th>
        <th>FechaREG</th>
        @if($socios == true)
        <th>Creador Por</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($procesos as $proceso)
        <tr>
            @if($socios == true)
            <th>{{$proceso->socio['documento']}}</th>
            <th>{{$proceso->socio['nombres']}}</th>
            @endif
            <td>{{$proceso->lugar}}</td>
            <td>{{$proceso->detalle}}</td>
            <td>{{$proceso->valor}}</td>
            <td>{{$proceso->created_at}}</td>
            @if($socios == true)
            <th>{{$proceso->creador['name']}} ({{$proceso->creador['user']}})</th>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
