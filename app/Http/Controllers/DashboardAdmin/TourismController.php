<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourism;
use App\Models\TourismImage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boundary = 5;
        $tourisms = Tourism::orderBy('created_at', 'desc')->paginate($boundary);
        $no = $boundary * ($tourisms->currentPage() - 1);
        return view('dashboard_admin.wisata.index', compact('tourisms', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_admin.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image_url'=>'image|file|max:1024',
        ]);
        
        try {
            DB::transaction(function () use($request){
                //save data to tourism table
                $tourism = new Tourism;
                $tourism->name = $request->name;
                $tourism->desc = $request->desc;
                $tourism->link_maps = $request->link_maps;
                $tourism->save();

                //save multiple image
                $image = array();
                if ($files = $request->file('image')) {
                    foreach ($files as $file) {
                        $imageName = Uuid::uuid4()->toString() . '.' . strtolower($file->getClientOriginalExtension());
                        $path= 'images/wisata/'; 
                        $imageUrl = $path.$imageName;
                        $file->move($path,$imageName);
                        // $image[] = $imageUrl;
                        $TourismImage = new TourismImage;
                        $TourismImage->tourism_id = $tourism->id;
                        $TourismImage->image_url = $imageUrl;
                        $TourismImage->save();
                    }
                }
                
            });
            return redirect('/dashboard/wisata');
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tourism $tourism)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tourism = Tourism::find($id);
        return view('dashboard_admin.wisata.edit', compact('tourism'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tourism = Tourism::find($id);
        $tourism->name = $request->name;
        $tourism->desc = $request->desc;
        $tourism->link_maps = $request->link_maps;
        $tourism->update();
        return redirect('/dashboard/wisata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tourism = Tourism::find($id);
        $images = $tourism->images()->orderBy('id', 'desc')->get();
        foreach ($images as $image) {
            if (file_exists($image->image_url)) {
                unlink($image->image_url);
            }

        }
        $tourism->delete();
        return redirect('/dashboard/wisata');
    }

    public function show_images($id)
    {
        $tourism = Tourism::find($id);
        $images = $tourism->images()->orderBy('id', 'desc')->get();
        // dd($images);
        return view('dashboard_admin.wisata.galeri', compact('images'));
        // return view('dashboard_admin.wisata.edit');
    }

}