@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Esta usted adentro del sistema JuarezSoft.
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Reportes de Ventas</div>
                <div class="card-body">
                    <div class="nav flex-column list-group">
                        @can('ver reportes')
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('ventas.diarias') }}">
                                Ventas diarias
                            </a>
                        </li>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('ventas.productos') }}">
                                Ventas por producto
                            </a>
                        </li>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('ventas.vendedores') }}">
                                Ventas por vendedor
                            </a>
                        </li>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        @can('ver administración')
        <div class="col-4">
            <div class="card">
                <div class="card-header">Administración</div>
                <div class="card-body">
                    <div class="nav flex-column list-group">
                        @can('administrar usuarios')
                        <li class="nav item list-group-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                Usuarios
                            </a>
                        </li>
                        <li class="nav item list-group-item">
                            <a class="nav-link" href="{{ route('users.nomina') }}">
                                Nómina
                            </a>
                        </li>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endcan

    </div>
</div>
@endsection
