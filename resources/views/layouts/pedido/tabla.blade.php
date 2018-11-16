<div class>
    <h5>Nombre del cliente {{$pedido->nombre_cliente}} {{$pedido->apellido_cliente}}</h5>
    <h5>Fecha:{{$pedido->fecha}}</h5>
    <table class="striped" style="width:100%">
        <tr>
            <th>Name:</th>
            <td>{{$pedido->encargado}}</td>
            <th>Apellido:</th>
            <td>{{$pedido->apellido_cliente}}</td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td>{{$pedido->telefono1}}</td>
            <th>Telefono 2:</th>
            <td>{{$pedido->telefono2}}</td>
        </tr>
        <tr>
            <th>Encargado:</th>
            <td>{{$pedido->encargado}}</td>
            <th>Telefono encargado:</th>
            <td>{{$pedido->telefono_encargado}}</td>
        </tr>
        <tr>
            <th>Trabajos especiales:</th>
            <td>
              @foreach ($pedido->Restricciones as $restriccion)
              <b>  {{$restriccion->nombre}} :</b> {{$restriccion->pivot->especificacion}}
              @endforeach
            </td>
            <th>Horarios:</th>
            <td>
              @foreach ($pedido->EntregaHorarios as $horario)
                <b>  {{$horario->horario}}</b>
              @endforeach
            </td>
        </tr>
        <tr>
          <th>Dias:</th>
          <td>
            @foreach ($pedido->EntregaDias as $dia)
            <b>  {{$dia->dia}}  </b><br>
            @endforeach
          </td>
          <th>Documentación requerida:</th>
          <td>
            @foreach ($pedido->Drequerida as $requerida)
              <b>  {{$requerida->nombre}}</b>
                  {{$requerida->pivot->especificacion}}
                  <br>
            @endforeach
          </td>
        </tr>
        <tr>
            <th>Trabajos especiales:</th>
            <td>
              @foreach ($pedido->especiales as $especial)
              <b>  {{$especial->descripcion}} :</b> {{$especial->pivot->precio}}
              @endforeach
            </td>
            <th>Trabajos especiales:</th>
            <td>
              @foreach ($pedido->restricciones as $restriccion)
              <b>  {{$restriccion->nombre}} :</b> {{$restriccion->pivot->especificacion}}
              @endforeach
            </td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td>{{$pedido->telefono1}}</td>
            <th>Telefono 2:</th>
            <td>{{$pedido->telefono2}}</td>
        </tr>
        <tr>
        </tr>
    </table>
</div>
