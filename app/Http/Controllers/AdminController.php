<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function getUserAccount(){   
        $user_data=DB::select('select * from users');
        return view('admin.userAccount',['user_data'=>$user_data]);
    }
    public function createWindow(){
        return view('admin.createWindow');
    }
    public function changePermission(Request $request){
        $userId=$request->id;
        $permission=$request->permission;
        $userData=DB::select('UPDATE users set permission=? where id=?',[$permission, $userId]);
    }
    public function removeUser(Request $request){
        $userId=$request->id;
        $userData=DB::select('Delete from users where id=?',[$userId]);
    }
    public function createAccount(Request $request){
        $username=$request->username;
        $password=Hash::make($request->password);
        $email=$request->email;
        $username=$request->username;
        $firstname=$request->firstname;
        $lastname=$request->lastname;
        $permission=$request->permission;
        $userData=DB::select('insert into users (name, email, password, firstname, lastname, permission,created_at,updated_at) values(?,?,?,?,?,?,now(),now())',[$username,$email,$password,$firstname,$lastname,$permission]);
        return redirect('/userAccount');
    }
    public function getUserRole(){
        return view('admin.roleWindow');
    }
    public function getTreeData(){
        $roleData=DB::select('select * from role where node=1');
        $treeData=array('text'=>'Page',"state"=>array("selected"=>0),'children'=>array());
        $firstChild=DB::select('select * from role where node=2');
        foreach($firstChild as $item){
            $itemData=array('text'=>$item->name,'state' => array('selected' => $item->checked),'children' => array() );
            $secondChild=DB::select('select * from role where node=3 and parent_id=?',[$item->id]);
            foreach ($secondChild as $seconditem){
                $nodeItem=array('text'=>$seconditem->name,'state'=>array('selected'=>$seconditem->checked));
                array_push($itemData['children'], $nodeItem);
            }
            array_push($treeData['children'], $itemData);
        }
        echo json_encode(array($treeData));
    }
    public function changeRole(Request $request){
        $roleData=array();
        $roleData=$request->roleData;
        if($roleData){
            $userData=DB::select('UPDATE role set checked=0');
            foreach($roleData as $item){
                $userData=DB::select('UPDATE role set checked=1 where id=?',[$item]);
            }
        }else{
            $userData=DB::select('UPDATE role set checked=0');

        }

    }
}
