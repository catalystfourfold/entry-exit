<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EntryExitLog;
use App\Models\User;

class ListController extends Controller
{
    public function index()
    {
        $logs = EntryExitLog::with('user')->where('in_building', true)->get();

        return view('list', ['logs' => $logs]);
    }
}
