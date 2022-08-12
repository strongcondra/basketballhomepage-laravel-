<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Teams;
use Illuminate\Auth\Events\Registered;
use DB;


class MemberController extends Controller
{
    //
    public function getmember(){
        $teamData = DB::table('teams')
        ->get();
        $memberData=DB::select('select * from members');
        return view('admin.addMembers', ['teamData' => $teamData,'memberData'=>$memberData]);
    }
    public function insertMembers(Request $request){
        $file = $request->file('imagefile');
   
        //Display File Name
        $fileName=$file->getClientOriginalName();
        // echo '<br>';
     
        //Display File Extension
        $imageFileType=$file->getClientOriginalExtension();
        $newFileName = md5(time() . $fileName) . '.' . $imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $message="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }else{
            $destinationPath = 'uploads/players';
            $file->move($destinationPath,$newFileName);
            $member = new Members;
            $member->no = $request->playernumber;
            $member->name = $request->playername;
            $member->position = $request->position;
            $member->college = $request->college;
            $member->age = $request->age;
            $member->height = $request->height;
            $member->weight = $request->weight;
            $member->logo = $newFileName;

            $member->save();
        }
        return redirect('/addTeamMembers');
    }
    public function removeMember(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM members WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
    public function getTeam(){
        $teamData=DB::select('select * from teams');
        return view('admin.addTeam',['teamData'=>$teamData]);
    }
    public function insertTeam(Request $request){
        $file = $request->file('imagefile');
   
        //Display File Name
        $fileName=$file->getClientOriginalName();
        // echo '<br>';
     
        //Display File Extension
        $imageFileType=$file->getClientOriginalExtension();
        $newFileName = md5(time() . $fileName) . '.' . $imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $message="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }else{
            $destinationPath = 'uploads';
            $file->move($destinationPath,$newFileName);
            $team = new Teams;
            $team->country = $request->country;
            $team->name = $request->teamname;
            $team->company = $request->teamcompany;
            $team->logopath = $newFileName;
            $team->logoname = $fileName;
            $team->save();
            $message="Add Team Success!";
        }
        return redirect('/addTeam');
    }
    public function removeTeam(Request $request){
        $no=$request->no;
        $deleteData=DB::select('DELETE FROM teams WHERE id=?', [$no]);
        echo json_encode($deleteData);
    }
}
