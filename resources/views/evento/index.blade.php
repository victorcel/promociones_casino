@extends('layouts.app')

@section('content')


    <div class="container text-center " style="">
        @include('layouts.info')
        @include('layouts.error')
        {{--@include('layouts.message')--}}
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
                        @if($evento->nombreEvento=="Polla Mundialista")
                            <input type="button" value='INGRESAR'
                                   onclick="window.location.href='https://polla.local'"
                                   class="btn btn-success btn-lg "
                                   style='width:100px; height: 70px;text-align: center'/>
                        @else
                            <input type="button" value='INGRESAR'
                                   onclick="window.location.href='https://chance.local:446/'"
                                   class="btn btn-success btn-lg "
                                   style='width:100px; height: 70px;text-align: center'/>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
        {{--@for ($i = 1; $i < 24; $i++)--}}
        {{--<br>--}}
        {{--@endfor--}}
        {{--{!! Form::submit('ANOTAR', ['class' => 'btn btn-success btn-lg pull-center','style'=>'width:100px;height: 70px;text-align: center']) !!}--}}


    </div>

@endsection