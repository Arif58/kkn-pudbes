<?php

namespace App\Http\Controllers\Client;

use App\Models\Tourism;
use App\Http\Controllers\Controller;

class PotensiWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourism = Tourism::orderBy('name', 'asc')->get();
        // dd($tourism);
        return view('client.list_wisata.index', compact('tourism'));
    }

   
}