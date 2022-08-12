<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pbyp;
use DB;
class PbypController extends Controller
{
    //
    public function getPbyp(){
        $teamData = DB::table('teams')
        ->get();
        $dateData = DB::table('results')
        ->get();
        return view('admin.addPbyp', ['teamData'=>$teamData,'dateData'=>$dateData]);
    }
    public function insertPbyp(Request $request){
        $pbyp = new Pbyp;
        $pbyp->play_date = $request->playDate;
        $pbyp->news_time = $request->newMinute.":".$request->newSecond;
        $pbyp->turn = $request->turn;
        $pbyp->team = $request->team;
        $pbyp->note = $request->note;
        $pbyp->save();
        return redirect('/addPbyp');
    }

}
