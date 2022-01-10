<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HydrationLog;

class HydrationLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HydrationLog::orderBy('created_at', 'DESC')->get();
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
        $newLog = new HydrationLog();
        $newLog->glasses = $request->hydrationlog["glasses"];
        $newLog->description = $request->hydrationlog["description"];

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
        $existingLog = HydrationLog::find($id);

        if ($existingLog) {
            $existingLog->glasses = $request->hydrationlog["glasses"];
            $existingLog->description = $request->hydrationlog["description"];

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
        $existingLog = HydrationLog::find($id);
        
        if ($existingLog) {
            $existingLog->delete();
            return "Log successfully deleted.";
        } else {
            return "Log not found.";
        }
    }
}
