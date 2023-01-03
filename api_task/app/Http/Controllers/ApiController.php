<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;



class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
         return $event;
    }


    public function EventShow()
    {
        // $event = Event::get();
        // // return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        // return $event;
        return $this->start_At->format('Y-m-d');
        return $this->end_at->format('Y-m-d');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
    
        ]);

        $event = new Event;
        $event->name = $request->input('name');
        $event->slug=$request->input('slug');
        $event->start_At=$request->input('start_At');
        $event->end_at=$request->input('end_at');
        $event->save();
        return $event;
        // $event = Event::create($request->all());
        // return (string) Str::uuid();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $event = Event::find($id);
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $event=Event::find($id);
        $event->update($request->all());
        return response()->json(["success"=>true, "message"=>"Updated successfully."]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return response()->json(["success" => True, "message" => "Deleted successfully."]);
    }
}
