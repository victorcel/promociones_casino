@extends('layouts.app')

@section('content')


    <div class="container text-center " style="">
        @include('layouts.info')
        @include('layouts.error')
        @include('layouts.message')
        <div>
            {{ $eventos->links() }}
            {{--{{ $info }}--}}
        </div>
        <div id="padre">
            @foreach($eventos as $evento)

                <div id="hijo">
                    <div class="product white-panel" style="height: 456px !important;">
                        <h3>{{$evento->nombreEvento}}</h3>
                        <img src="{{ asset($evento->imagen )}}" class="img-responsive img-shirt">
                        <br>
                        {{--<input id="tarjeta" type="text" class="form-control"  name="tarjeta" value="{{ old('tarjeta') }}"required autofocus/>--}}
                        {{--href="{{ route('evento.show', $evento->id) }}"--}}
                        <a  data-toggle="modal" data-target="#exampleModal"
                           class="btn btn-success btn-lg "
                           >INGRESAR</a>

                    </div>
                </div>
                @extends('layouts.showModal')
            @endforeach

        </div>
        {{--@for ($i = 1; $i < 24; $i++)--}}
        {{--<br>--}}
        {{--@endfor--}}
        {{--{!! Form::submit('ANOTAR', ['class' => 'btn btn-success btn-lg pull-center','style'=>'width:100px;height: 70px;text-align: center']) !!}--}}


    </div>

@endsection