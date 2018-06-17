@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Botelas Disponibles</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Tarjeta Sun Readws: <strong> {{$user[0]->username}}</strong></h1>
                        <h1>Cliente: <strong> {{$user[0]->name}} {{ $user[0]->last_name }}</strong></h1>
                        <h1>
                            Numero de boletas acomuladas: <strong> {{ $numBoletas }}</strong>
                        </h1>
                        {!! Form::open(['route' => 'evento.redimir', 'method' => 'post'] ) !!}
                        <input type="hidden" name="usuario" value="{{$user[0]->id}}"/>
                        <input type="hidden" name="tarjeta" value="{{$user[0]->username}}"/>
                            <input type="hidden" name="idEvento" value="{{$idEvento}}"/>
                        <input type="hidden" name="puntos" value="{{ $sumaPunto }}"/>
                        @if($numBoletas>=1)
                            {!! Form::submit('Redimir', ['class' => 'btn btn-success btn-lg pull-left','style'=>'width:100px;height: 70px;text-align: center']) !!}
                        @endif
                        {!! Form::close() !!}
                        <input type="button" value='Salir' onclick="window.location.href='{{ route('index') }}'"
                               class="btn btn-primary btn-lg pull-right"
                               style='width:100px; height: 70px;text-align: center'/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection