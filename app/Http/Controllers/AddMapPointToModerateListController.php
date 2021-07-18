<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMapPointToModerateListRequest;
use App\Models\Map;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddMapPointToModerateListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(AddMapPointToModerateListRequest $request) :RedirectResponse
    {
        $newMapPoint = new Map;
        $newMapPoint->name = $request->name;
        $newMapPoint->num = $request->num;
        $newMapPoint->coordinates = $request->coordinates;
        $newMapPoint->coverage = $request->coverage;
        $newMapPoint->type = $request->type;
        $newMapPoint->net = $request->net;
        $newMapPoint->light = $request->light;
        $newMapPoint->pay = $request->pay;
        $newMapPoint->website = $request->website;
        $newMapPoint->comment = $request->comment;
        $newMapPoint->moderated = false;
        $newMapPoint->save();
        return redirect('/add')->with('status', 'ok');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
