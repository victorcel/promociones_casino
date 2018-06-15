<?php

namespace App\Http\Controllers;

use App\Evento;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $date = new DateTime();
        //dd($date->format('Y-m-d'));
        $sumaPunto = 0;
        $consFecha = DB::select("SELECT * FROM `reportes` WHERE date(created_at) ='" . $date->format('Y-m-d') . "'and user_id=" . Auth::user()->id . " order by created_at desc limit 1");
        // dd($consFecha[0]);
        $consultas = DB::connection('sqlsrv')->select("declare @res int
set @res=(select tPlayer.PlayerId from tPlayer ,tPlayerCard ,tPlayerIdentType where tPlayer.PlayerId = tPlayerCard.PlayerId and tPlayer .PlayerId = tPlayerIdentType .PlayerId and tPlayerCard .Acct=" . Auth::user()->username . ")
exec spGetAwardActivityHourPoints @CasinoID = N'1',@PlayerID =@res,@AccumulatorPeriod = N'H',@ShowAvgBetTime = 0,@ShowByDepartment = 1,@DebugLevel = 0,@IsTierPoint = 0;");
        if (count($consFecha) > 0) {
            $consulFecha = new DateTime($consFecha[0]->created_at);
            foreach ($consultas as $consulta) {
                $date = new DateTime();
                $fecha = new DateTime($consulta->Period);

                if ($fecha->format('Y-m-d H:i') > $consulFecha->format('Y-m-d H:i')) {
                    $sumaPunto += $consulta->Base;
                }
            }
            if ($sumaPunto > 0) {
                $reporte = new Reporte;
                $reporte->puntos = $sumaPunto;
                $reporte->user_id = Auth::user()->id;
                $reporte->save();
            }

        } else {
            foreach ($consultas as $consulta) {
                $date = new DateTime();
                date_modify($date, '-24 hour');
                $fecha = new DateTime($consulta->Period);
                if ($fecha->format('Y-m-d H') >= $date->format('Y-m-d H')) {
                    $sumaPunto += $consulta->Base;
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //return view('evento.show');
        dd($evento->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
