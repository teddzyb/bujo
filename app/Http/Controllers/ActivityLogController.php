<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityLog::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newLog = new ActivityLog();
        $newLog->activity = $request->activitylog["activity"];
        $newLog->time = $request->activitylog["time"];
        $newLog->description = $request->activitylog["description"];

        $newLog->save();
        return $newLog;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingLog = ActivityLog::find($id);

        if ($existingLog) {
            $existingLog->activity = $request->activitylog["activity"];
            $existingLog->time = $request->activitylog["time"];
            $existingLog->description = $request->activitylog["description"];

            $existingLog->save();
            return $existingLog;
        } else {
            return "Log not found.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingLog = ActivityLog::find($id);
        
        if ($existingLog) {
            $existingLog->delete();
            return "Log successfully deleted.";
        } else {
            return "Log not found.";
        }
    }
}
