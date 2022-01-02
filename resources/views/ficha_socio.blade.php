<img src="logo.png" width="80%" style="margin-left: 10%" alt="">
<table style="width: 100%; margin-top: -50px;">
    <tr style="width: 100%">
        <td style="width: 80%"></td>
        <td style="width: 20%">
            <img src="{{public_path('documentos_imagenes/').$socio->foto}}" width="100%" alt="">
        </td>
    </tr>
</table>
<table style="width: 100%">
    <tr style="width: 100%">
        <td style="width: 70%"> <b> Sr. Presidente </b> de la Asociación de Militares Nueva Visión F.A.</td>
        <td style="width: 30%">
            Registro: {{$socio->id}} <br>
            Fecha: {{date('Y/m/d H:i:s')}}
        </td>
    </tr>
</table>

Presente. <br>
Yo  <b>{{$socio->nombres}}</b> <br>

Portador de la C.I <b>{{$socio->documento}}</b> libre y voluntariamente solicito, muy comedidamente a usted Sr. <br>
Presidente se digne autorizarme ingresar en calidad de socio de la Asociación de Militares Nueva Visión F.A. Por la gentil acogida expreso mi agracedimiento. <br>

<table style="width: 100%">
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Email: </b> </td>
        <td style="width: 25%"> <b> {{$socio->correo}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Celular: </b> </td>
        <td style="width: 25%"> <b> {{$socio->movil}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Convencional: </b> </td>
        <td style="width: 25%"> <b>  </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Nombre Referencia: </b> </td>
        <td style="width: 25%"> <b> {{$socio->nombres_referencia}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Numero Referencia: </b> </td>
        <td style="width: 25%"> <b> {{$socio->movil_referencia}} </b> </td>
        <td style="width: 50%; text-align: center"> Firma. </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Fuerza: </b> </td>
        <td style="width: 25%"> <b> {{$socio->fuerza['value']}} </b> </td>
        <td style="width: 50%; text-align: center">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Estado: </b> </td>
        <td style="width: 25%"> <b> {{$socio->estado['value']}} </b> </td>
        <td style="width: 50%; text-align: center">  </td>
    </tr>
</table>
<br>
<div style="width: 100%; text-align: center">
<b style="text-align: center; font-size: 25px">AUTORIZACION DE DEBITO</b> <br>
<b style="text-align: center; font-size: 25px">Banco. {{$socio->banco['nombre']}}</b> <br>
</div>
<table style="width: 100%">
    <tr style="width: 100%">
        <td style="width: 70%"> Yo <b> {{$socio->nombres}} </b> </td>
        <td style="width: 30%">
            Registro: {{$socio->id}} <br>
            Fecha: {{date('Y/m/d H:i:s')}} <br>
            C.I.: {{$socio->documento}}
        </td>
    </tr>
</table>

Autorizo a la Asociación de Militares Nueva Visión F.A. Se debite de mi cuenta No.
<b>{{$socio->cuenta}}</b> del Banco. <b>{{$socio->banco['nombre']}}</b> La cantidad de 5 dólares mensuales, 10 dólares
bimensuales, 30 dólares semestrales, 40 dólares octomestrales y / o 60 dólares anuales.
De igual forma me comprometo a mantener los fondos suficientes en mi cuenta a fin de cubrir los
valores cuyo debito autorizo a través de este instrumento.
Valores que me obligo a pagar y autorizo debitar de mi cuenta antes referida, durante el tiempo que
subsista la Asociación de Militares Nueva Visión F.A.
Eximo al Banco de toda responsabilidad por los Cobros que efectúe la Asociación de Militares Nueva
Visión F.A. en virtud de la presente autorización de debito, por lo que renuncio a presentar por este
concepto, cualquier acción legal, jurídica, o extrajudicial en contra del Banco.

<table style="width: 100%">
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Email: </b> </td>
        <td style="width: 25%"> <b> {{$socio->correo}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Celular: </b> </td>
        <td style="width: 25%"> <b> {{$socio->movil}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Convencional: </b> </td>
        <td style="width: 25%"> <b>  </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Nombre Referencia: </b> </td>
        <td style="width: 25%"> <b> {{$socio->nombres_referencia}} </b> </td>
        <td style="width: 50%">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Numero Referencia: </b> </td>
        <td style="width: 25%"> <b> {{$socio->movil_referencia}} </b> </td>
        <td style="width: 50%; text-align: center"> Firma. </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Fuerza: </b> </td>
        <td style="width: 25%"> <b> {{$socio->fuerza['value']}} </b> </td>
        <td style="width: 50%; text-align: center">  </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 25%"> <b> Estado: </b> </td>
        <td style="width: 25%"> <b> {{$socio->estado['value']}} </b> </td>
        <td style="width: 50%; text-align: center">  </td>
    </tr>
</table>