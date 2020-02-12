<?php

namespace App\Http\Controllers;

use App\Mata_pelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');

    }

    public function index()
    {
        //
        $mapel = Mata_pelajaran::all();
        return view('mapel.index',compact('mapel'));
    }


    public function create()
    {
        //
        return view('mapel.create');
    }


    public function store(Request $request)
    {
        //
        $mapel = new Mata_pelajaran();
        $mapel->mapel = $request->mapel;
        $mapel->save();
        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mapel = Mata_pelajaran::findOrfail($id);
        return view('mapel.show',compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mapel = Mata_pelajaran::findOrfail($id);
        return view('mapel.edit',compact('mapel'));
    }


    public function update(Request $request, $id)
    {
        //
        $mapel = Mata_pelajaran::findOrfail($id);
        $mapel->mapel = $request->mapel;
        $mapel->save();
        return redirect()->route('mapel.index');
    }


    public function destroy($id)
    {
        //
        $mapel = Mata_pelajaran::findOrfail($id)->delete();
        return redirect()->route('mapel.index');
    }
}
