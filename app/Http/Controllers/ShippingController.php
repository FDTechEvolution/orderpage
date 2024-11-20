<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{

    public static function getTrackingUrl(){
        return [
            'FLASH'=>['url'=>'https://flashexpress.com/fle/tracking?se=','logo'=>'','title'=>''],
            'KERRY'=>['url'=>'https://th.kerryexpress.com/th/track/v2/?track=','logo'=>'','title'=>''],
            'THPOST_POSTONE'=>['url'=>'https://track.thailandpost.co.th/?trackNumber=','logo'=>'','title'=>''],
            'THPOST_PROSHIP'=>['url'=>'https://track.thailandpost.co.th/?trackNumber=','logo'=>'','title'=>''],
            'NO'=>['url'=>'','logo'=>'','title'=>''],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
