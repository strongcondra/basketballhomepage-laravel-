<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournamemts;
use App\Models\Teams;
use Illuminate\Auth\Events\Registered;
use DB;


class TournamentController extends Controller
{
    //
    public function inittournament(){
        $tournamentData = DB::table('tournamemts')->latest()->first();
        return view('tournament',['tournamentData'=> $tournamentData]);
    }
    public function gettournament(){
        $teamData = DB::table('teams')
        ->get();
        $competitionData = DB::table('competitions')
        ->get();
        $tournamentData = DB::table('tournamemts')->latest()->first();
        return view('admin.tournament', ['teamData' => $teamData, 'tournamentData'=>$tournamentData,'competitionData'=>$competitionData]);
    }
    public function store(Request $request){
        $tournaments =Tournamemts::updateOrCreate(
            ['id'=>1],
            [   'play_year'=>$request->play_year,'competition'=>$request->competition,
                'team11'=>$request->team11,'score11'=>$request->score11,
                'team12'=>$request->team12,'score12'=>$request->score12,
                'team13'=>$request->team13,'score13'=>$request->score13,
                'team14'=>$request->team14,'score14'=>$request->score14,
                'team15'=>$request->team15,'score15'=>$request->score15,
                'team16'=>$request->team16,'score16'=>$request->score16,
                'team17'=>$request->team17,'score17'=>$request->score17,
                'team18'=>$request->team18,'score18'=>$request->score18,
                'team21'=>$request->team21,'score21'=>$request->score21,
                'team22'=>$request->team22,'score22'=>$request->score22,
                'team23'=>$request->team23,'score23'=>$request->score23,
                'team24'=>$request->team24,'score24'=>$request->score24,
                'team31'=>$request->team31,'score31'=>$request->score31,
                'team32'=>$request->team32,'score32'=>$request->score32,
                'team41'=>$request->team41,'score41'=>$request->score41,
            ]
        );

        return redirect('/tournament');
    }
}
