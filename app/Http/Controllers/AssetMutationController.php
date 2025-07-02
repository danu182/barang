<?php

namespace App\Http\Controllers;

use App\Models\AssetMutation;
use App\Models\Barang;
use Illuminate\Http\Request;

class AssetMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $assetMutation = AssetMutation::all();

        return view('assetMutasi.index', compact('assetMutation'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="tmabah mutasi";

        $barang= Barang::with('ram', 'ram.tipeRam_id')->get();

        return $barang;


        return view('assetMutasi.create', compact('title','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetMutation $assetMutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetMutation $assetMutation)
    {
        //
    }
}
