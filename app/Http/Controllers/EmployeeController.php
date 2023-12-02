<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\EntryExitLog;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.choose-action');
    }

    public function enter(Request $request)
    {
        $today = Carbon::today();

        $existingEntry = EntryExitLog::where('user_id', Auth::id())
            ->where('in_building', true)
            ->whereDate('created_at', $today)
            ->first();

        if ($existingEntry) {
            return redirect('/employee/error');
        } else {
            EntryExitLog::create([
                'user_id' => Auth::id(), 
                'user_name' => Auth::user()->name,
                'in_building' => true,
            ]);
    
            return redirect('/employee/success');
        }
    }

    public function exit(Request $request)
    {
        $today = Carbon::today();

        $existingEntry = EntryExitLog::where('user_id', Auth::id())
            ->where('in_building', true)
            ->whereDate('created_at', $today)
            ->first();

        if ($existingEntry) {
            $existingEntry->update(['in_building' => false]);
            return redirect('/employee/success');
        } else {
            return redirect('/employee/error');
        }
    }

    public function success()
    {
        return view('success');
    }

    public function error()
    {
        return view('error');
    }
}
