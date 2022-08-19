<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function changeMode($mode)
    {
        session(['mode' => $mode]);
        return redirect('/');
    }
}
