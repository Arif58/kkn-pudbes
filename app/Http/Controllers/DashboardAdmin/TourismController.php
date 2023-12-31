<?php

namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourism;
use App\Models\TourismImage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
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
                $tourism->address = $request->address;
                $tourism->link_maps = $request->link_maps;
                $tourism->save();
                
                //save data to tourism_images
                if ($request->hasFile('image')) {
                    $uploadedFile = $request->file('image');
                    $filename = Uuid::uuid4()->toString() . '.' . $uploadedFile->getClientOriginalExtension();
                    $path = $uploadedFile->move(public_path('images'), $filename);
                    $image = new TourismImage;
                    $image->tourism_id = $tourism->id;
                    $image->image_url = $path;
                    $image->save();
                }

                //save multiple image
                // if ($request->hasFile('image')) {
                //     foreach ($request->file('image') as $image) {
                //         $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                //         $path= $image->storeAs('images', $filename); 
                        
                //         $TourismImage = new TourismImage;
                //         $TourismImage->tourism_id = $tourism->id;
                //         $TourismImage->image_url = $path;
                //         $TourismImage->save();
                //     }
                // }
            });
            return redirect('/dashboard/wisata');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed'
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
    public function edit(Tourism $tourism)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tourism $tourism)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tourism $tourism)
    {
        //
    }
}