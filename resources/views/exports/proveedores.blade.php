<table>
    <thead>
      <tr>
        <th>Cedula / RUC</th>
        <th>Razon Social</th>
        <th>Telefono</th>
        <th>Movil</th>
        <th>Correo</th>
        <th>Estado</th>
        <th>Observaciones</th>
        <th>Obligado</th>
        <th>Serie</th>
        <th>Secuencia</th>
        <th>Autorizacion</th>
        <th>F. Caducidad</th>
        <th>Credito</th>
        <th>Tiempo Credito</th>
        <th>Codigo / Cedula Presupuestaria / Cuenta</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
        <tr>
            <th> {{$proveedor->documento}} </th>
            <th>{{$proveedor->razon_social}}</th>
            <th> {{$proveedor->telefono}} </th>
            <th> {{$proveedor->movil}} </th>
            <th> {{$proveedor->correo}} </th>
            <th> @if($proveedor->status == true) Activo @else Inactivo @endif </th>
            <th> {{$proveedor->observaciones}} </th>
            <th> @if($proveedor->obligado == true) Si @else No @endif </th>
            <th> {{$proveedor->serie}} </th>
            <th> {{$proveedor->secuencia}} </th>
            <th> {{$proveedor->autorizacion}} </th>
            <th> {{$proveedor->caducidad}} </th>
            <th> @if($proveedor->credito == true) Si @else No @endif </th>
            <th> {{$proveedor->tiempo_credito}} </th>
            <th> {{$proveedor->cuenta['codigo']}} / {{$proveedor->cuenta['cedula_presupuestaria']}} / {{$proveedor->cuenta['cuenta']}} </th>
        </tr>
        @endforeach
    </tbody>
  </table>