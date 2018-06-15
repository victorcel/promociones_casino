@extends('layouts.app')

@section('content')
    <div class="container text-center">
        @include('layouts.info')
        @include('layouts.error')
        @include('layouts.message')
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i> Polla Mundialista</h1>
        </div>
        <div class="table-cart">

            @if(count($tickets) > 0)
                <p>
                    <a href="{{ route('ticket.trash') }}" class="btn btn-danger">
                        Vaciar Polla Mundialista <i class="fa fa-trash"></i>
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Partido </th>
                            <th>Equipo 1</th>
                            <th>Equipo 2</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as $tic)
                            <tr>
                                <td>{{ $tic[0]['slug'] }}</td>
                                <td>{{ $tic[0]['equipo_1'] }}</td>
                                <td>{{ $tic[0]['equipo_2'] }}</td>
                                <td>
{{--                                    {{ dd($tic['slug']) }}--}}
                                    {!! Form::open(['route' => ['ticket.destroy',$tic[1]], 'method' => 'DELETE']) !!}
                                    <button  class="btn btn-danger fa fa-remove"></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <h3><span class="label label-success">Total: {{ $total }}</span></h3>
                </div>
            @else
                <h3>No hay polla mundialista, agrega <a href=" {{ url('/')}}">uno</a>!</h3>
            @endif
            <hr>
            <p>
                <a href="{{ url('/') }}" class="btn btn-primary">
                    <i class="fa fa-chevron-circle-left"></i> Seguir Anotando Polla Mundialista
                </a>
                @if(count($tickets) > 0)
                    <a href="{{ route('ticket.save') }}" class="btn btn-primary">
                        <i class="fa fa-chevron-circle-right"></i> Guardar Polla Mundialista
                    </a>
                @endif
            </p>
        </div>
    </div>
@endsection