<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use DB;
class ResultController extends Controller
{
    public function getResult(){
        $teamData = DB::table('teams')
        ->get();
        $competitionData = DB::table('competitions')
        ->get();
        $memberData = DB::table('members')
        ->get();
        $resultData=DB::select('select * from results');
        return view('admin.addResult',['teamData'=>$teamData,'competitionData'=>$competitionData,'memberData'=>$memberData, 'resultData'=>$resultData]);
    }
    public function insertResult(Request $request){
        $result = new Results;
        $result->competition = $request->competition;
        $result->play_date = $request->playDate;
        $result->versus = $request->versus;
        $result->first_score_in = $request->firstScoreIn;
        $result->second_score_in = $request->secondScoreIn;
        $result->third_score_in = $request->thirdScoreIn;
        $result->fourth_score_in = $request->fourthScoreIn;
        $result->first_score_out = $request->firstScoreOut;
        $result->second_score_out = $request->secondScoreOut;
        $result->third_score_out = $request->thirdScoreOut;
        $result->fourth_score_out = $request->fourthScoreOut;
        $result->score_in = $request->firstScoreIn+$request->secondScoreIn+$request->thirdScoreIn+$request->fourthScoreIn;         
        $result->score_out = $request->firstScoreOut+$request->secondScoreOut+$request->thirdScoreOut+$request->fourthScoreOut;
        $result->h_point = $request->hPoint;
        $result->h_rebound = $request->hRebound;
        $result->h_assist = $request->hAssist;
        $result->h_steal = $request->hSteal;
        $result->save();
        return redirect('/addResult');
    }
    public function removeResult(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM results WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
}
