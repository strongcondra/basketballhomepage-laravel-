<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use DB;
class ScheduleController extends Controller
{
    //
    public function getSchedule(){
        $teamData = DB::table('teams')
        ->get();
        $competitionData = DB::table('competitions')
        ->get();
        $venueData = DB::table('venues')
        ->get();
        $scheduleData=DB::select('select * from schedule');
        return view('admin.addSchedule',['teamData'=>$teamData,'competitionData'=>$competitionData,'venueData'=>$venueData, 'scheduleData'=>$scheduleData]);
    }
    public function insertSchedule(Request $request){
        $schedule = new Schedule;
        $schedule->competition = $request->competition;
        $schedule->play_date = $request->playDate;
        $schedule->play_time = $request->playTime;
        $schedule->versus = $request->versus;
        $schedule->venue = $request->venue;
        $schedule->save();
        return redirect('/addSchedule');
    }
    public function removeSchedule(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM schedule WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
}
