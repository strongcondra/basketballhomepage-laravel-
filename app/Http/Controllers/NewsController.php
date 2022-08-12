<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Auth\Events\Registered;
use DB;

class NewsController extends Controller
{
    public function getNews(){
        $newsData = DB::table('news')
        ->get();
        return view('news', ['newsData' => $newsData]);
    }
    public function store(Request $request)
    {

        $news = new News;
 
        $news->title = $request->newsTitle;
        $news->content = $request->newsContent;

        $news->save();
        return redirect('/addNews');
    }
}
