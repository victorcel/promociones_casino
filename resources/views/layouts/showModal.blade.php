<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tarjeta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    {!! Form::open(['route' => 'evento.store']) !!}

                    <div class="form-group">
                        {!! Form::label('tarjeta', 'Tarjeta Sun Readws') !!}
                        <script>
                            $('#exampleModal').on('shown.bs.modal', function () {
                                $('#tarjeta').focus();
                            })
                        </script>
                        {!! Form::text('tarjeta', "", ['class' => 'form-control','autofocus=autofocus','required'=>'required','autocomplete'=>'off']) !!}
                        {!! Form::hidden('idEvento', $evento->id) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('CONSULTAR', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {{--<input id="tarjeta" type="text" class="form-control" name="tarjeta" required autofocus/>--}}

                    {{--<a href=""--}}
                    {{--class="btn btn-primary btn-lg "--}}
                    {{-->CONSULTAR</a>--}}
                    {!! Form::close() !!}
                </div>
            </div>
            {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>