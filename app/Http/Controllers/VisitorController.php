<?php

namespace App\Http\Controllers;

use App\Models\EntryExitLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitor.choose-action');
    }

    public function enter(Request $request)
    {
        $visitorName = $request->query('name');

        EntryExitLog::create([
            'visitor_name' => $visitorName,
            'in_building' => true,
        ]);

        return redirect('/visitor/success')->with('name', $visitorName);
    }

    public function exit(Request $request)
    {
        $visitorName = $request->query('name');

        $existingEntry = EntryExitLog::where('visitor_name', $visitorName)
            ->where('in_building', true)
            ->first();

        if ($existingEntry) {
            $existingEntry->update(['in_building' => false]);
            return redirect('/visitor/success')->with('name', $visitorName);
        } else {
            return redirect('/visitor/error');
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