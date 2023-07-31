<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\Tourism;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::find(1);
        // @dd($profile);
        return view('dashboard_admin.profile.index', compact('profile'));
    }

    public function update_desc(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->desc = $request->desc;
        $profile->update();
        return redirect('/dashboard/profile');
    }
    
    public function update_history(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->history = $request->history;
        $profile->update();
        return redirect('/dashboard/profile');
    }
    
    public function update_visi(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->visi = $request->visi;
        $profile->update();
        return redirect('/dashboard/profile');
    }
    
    public function update_misi(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->misi = $request->misi;
        $profile->update();
        return redirect('/dashboard/profile');
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
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}