<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DailyLog;

class DailyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DailyLog::orderBy('created_at', 'DESC')->get();
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
        $newLog = new DailyLog;
        $newLog->title = $request->dailylog["title"];
        $newLog->mood = $request->dailylog["mood"];
        $newLog->description = $request->dailylog["description"];

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
        $existingLog = DailyLog::find($id);

        if ($existingLog) {
            $existingLog->title = $request->dailylog["title"];
            $existingLog->mood = $request->dailylog["mood"];
            $existingLog->description = $request->dailylog["description"];

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
        $existingLog = DailyLog::find($id);
        
        if ($existingLog) {
            $existingLog->delete();
            return "Log successfully deleted.";
        } else {
            return "Log not found.";
        }
    }
}
