<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response ["abouts"] = About::all(); 
        return view("about.index",$response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("about.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request->all());
        $data = $request->except("_token");
        //die();
        About::insert($data);
        return redirect()-> route("about.index");
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
        $data = About::findOrFail($id);

        //dd($data);
        return view("about.edit")->with(["about" => $data]);
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
        /*dump($id);
        dump($request -> all());
        die();*/

        $data = $request->except("_token", "_method");
        About::where("id","=",$id)->update($data);
        return redirect()-> route("about.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::destroy($id);
        return redirect()-> route("about.index");
    }

    public function search(Request $request)
    {
        $search = $request->input("search");
        $result = About::select()
        ->where ("name", "like", "%$search%")
        ->orWhere ("email", "like", "%$search%")
        ->orWhere ("phone", "like", "%$search%")
        ->get();
        return view("about.index")->with(["abouts" => $result]);
    }
}
