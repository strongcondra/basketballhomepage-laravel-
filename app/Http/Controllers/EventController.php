<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EventController extends Controller
{
    //
    public function getroster(){
        $memberData = DB::table('members')
        ->get();
        return view('roster',['memberData'=>$memberData]);
    }
    public function getresult(){
        $resultData = DB::table('results')
        ->get();
        return view('result',['resultData'=>$resultData]);
    }
    public function getschedule(){
        $scheduleData = DB::table('schedule')
        ->get();
        return view('schedule',['scheduleData'=>$scheduleData]);
    }
    public function initpbyp(){
        $firstData=array();
        $secondData=array();
        $thirdData=array();
        $fourthData=array();
        $resultData=array();
        $dateData = DB::select('SELECT DISTINCT play_date from pbyp ORDER BY play_date DESC');
        $pbypData= DB::select('SELECT DISTINCT play_date from pbyp ORDER BY play_date DESC LIMIT 1 ');
        if($pbypData){
            $firstData = DB::table('pbyp')
            ->where('turn','1')
            ->where('play_date', $pbypData[0]->play_date)
            ->orderBy('news_time', 'asc')
            ->get();
            $secondData = DB::table('pbyp')
            ->where('play_date', $pbypData[0]->play_date)
            ->orderBy('news_time', 'asc')
            ->where('turn','2')
            ->get();
            $thirdData = DB::table('pbyp')
            ->where('play_date', $pbypData[0]->play_date)
            ->orderBy('news_time', 'asc')
            ->where('turn','3')
            ->get();
            $fourthData = DB::table('pbyp')
            ->where('play_date', $pbypData[0]->play_date)
            ->orderBy('news_time', 'asc')
            ->where('turn','4')
            ->get();
            $resultData=DB::select('select * from results INNER JOIN teams on results.versus= teams.name where play_date= ? limit 1', [$pbypData[0]->play_date]);
        }
        return view('pbyp',['firstData'=>$firstData,'secondData'=>$secondData,'thirdData'=>$thirdData,'fourthData'=>$fourthData, 'dateData'=>$dateData, 'resultData'=>$resultData]);
    }
    public function changePbyp(Request $request){
        $firstData=array();
        $secondData=array();
        $thirdData=array();
        $fourthData=array();
        $resultData=array();
        $pbypData=$request->pbypDate;
        $dateData = DB::select('SELECT DISTINCT play_date from pbyp ORDER BY play_date DESC');

        $firstData = DB::table('pbyp')
        ->where('turn','1')
        ->where('play_date', $pbypData)
        ->orderBy('news_time', 'asc')
        ->get();
        $secondData = DB::table('pbyp')
        ->where('play_date', $pbypData)
        ->orderBy('news_time', 'asc')
        ->where('turn','2')
        ->get();
        $thirdData = DB::table('pbyp')
        ->where('play_date', $pbypData)
        ->orderBy('news_time', 'asc')
        ->where('turn','3')
        ->get();
        $fourthData = DB::table('pbyp')
        ->where('play_date', $pbypData)
        ->orderBy('news_time', 'asc')
        ->where('turn','4')
        ->get();
        $resultData=DB::select('select * from results INNER JOIN teams on results.versus= teams.name where play_date= ? limit 1', [$pbypData]);
        echo json_encode(['firstData'=>$firstData,'secondData'=>$secondData,'thirdData'=>$thirdData,'fourthData'=>$fourthData, 'dateData'=>$dateData, 'resultData'=>$resultData]);
    }
}
