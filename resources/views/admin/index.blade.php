@extends('adminlte::page')

{{-- Customize layout sections --}}

@section('content_header')
    <h1><b> Bienvenido</b></h1>
@stop
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <div class="row">
                    <div class="col-md-3" style="margin-top: 8px">
                        <a href="{{url('/admin/configuraciones')}}">
                            <img src="{{url('/images/ajustes.gif')}}" width="100%" alt="imagen">

                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Total config.</b></h5>
                        {{$total_configuraciones}} configuraciones

                    </div>
                </div>
            </div>

        </div>

         <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <div class="row">
                    <div class="col-md-3" style="margin-top: 8px">
                        <a href="{{url('/admin/roles')}}">
                            <img src="{{url('/images/roles.gif')}}" width="100%" alt="imagen">

                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Total roles</b></h5>
                        {{$total_roles}} roles

                    </div>
                </div>
            </div>

        </div>
         <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <div class="row">
                    <div class="col-md-3" style="margin-top: 8px">
                        <a href="{{url('/admin/usuarios')}}">
                            <img src="{{url('/images/usuario.gif')}}" width="100%" alt="imagen">

                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>total usuarios</b></h5>
                        {{$total_usuarios}} usuarios

                    </div>
                </div>
            </div>

        </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <div class="row">
                    <div class="col-md-3" style="margin-top: 8px">
                        <a href="{{url('/admin/usuarios')}}">
                            <img src="{{url('/images/cliente.gif')}}" width="100%" alt="imagen">

                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>total clientes</b></h5>
                        {{$total_usuarios}} clientes

                    </div>
                </div>
            </div>

        </div>
          

    </div>
@stop

@section('css')

@stop
@section('js')

@stop
