<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitions;
use App\Models\Venues;
use DB;
class BasicController extends Controller
{
    public function getCompetition(){
        $competitionData=DB::select('select * from competitions');
        return view('admin.addCompetition',['competitionData'=>$competitionData]);
    }
    public function insertCompetition(Request $request){
        
        $competitions = new Competitions;
 
        $competitions->title = $request->title;

        $competitions->save();
        return redirect('/addCompetition');
    }
    public function removeCompetition(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM competitions WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
    public function getVenue(){
        $venueData=DB::select('select * from venues');
        return view('admin.addVenue',['venueData'=>$venueData]);
    }
    public function insertVenue(Request $request){
        
        $venues = new Venues;
 
        $venues->venue = $request->venue;

        $venues->save();
        return redirect('/addVenue');
    }
    public function removeVenue(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM venues WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
}
