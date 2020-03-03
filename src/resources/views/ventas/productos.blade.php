@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Filtros</div>
        <div class="card-body">
          <form method="get" action="{{ route('ventas.productos') }}">

            <div class="form-group">
              <label for="fecha_inicio">Fecha de inicio:</label>
              <input type="date" name="fecha_inicio" id="fecha_inicio" 
                value="{{ $fecha_inicio }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="fecha_fin">Fecha final:</label>
              <input type="date" name="fecha_final" id="fecha_final"
                value="{{ $fecha_final }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="orden">Ordenación:</label>
              <select name="orden" class="form-control">
                <option value=""{{ $orden==""? " selected": "" }}>
                  Total
                </option>
                <option value="fecha"{{ $orden=="fecha"?" selected": ""}}>
                  Fecha
                </option>
              </select>
            </div>
            <input type="submit" value="Aplicar" class="btn btn-primary">
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Producto</th>
              <th>Total</th>
            </tr>
          </thead>
          @foreach ($datos as $dato)
            <tr>
              <td>{{ $dato->fecha }}</td>
              <td>{{ $dato->nombre }}</td>
              <td align="right">{{ number_format($dato->total, 2) }}</td>
            </tr>
          @endforeach
        </table>

      </div>
    </div>
  </div>
</div>
@endsection
