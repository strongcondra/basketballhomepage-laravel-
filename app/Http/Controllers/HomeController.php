<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Auth\Events\Registered;
use DB;
class HomeController extends Controller
{
    public function getHome(){
        $newsData = DB::table('news')
            ->limit(2)
            ->get();
        return view('home', ['newsData' => $newsData]);    
    }
}
