<?php

namespace App\Http\Controllers;

use App\Mail\SeriesCreated;
use App\Models\Serie;
use Illuminate\Http\Request;
use Mail;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $series = Series::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $series=Serie::create($request->all());
        $email=new SeriesCreated($request->input("nome"));
        Mail::to($request->user())->send($email);
        return 'serie criada com sucesso';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $series)
    {
        $series->fill($request->all());
        $series->save();
        return 'series criada com sucesso';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Serie::destroy($id);
        return 'serie deletada com sucesso';
    }
}
