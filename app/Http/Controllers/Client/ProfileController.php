<?php

namespace App\Http\Controllers\Client;

use App\Models\Profile;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::find(1);
        return view('client.profile.index', compact('profile'));
    }

   
}