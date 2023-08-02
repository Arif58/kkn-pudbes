<?php
namespace App\Http\Controllers\DashboardAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tourism;
use App\Models\TourismImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
class TourismImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $tourism = Tourism::find($id);
        $images = $tourism->images()->orderBy('id', 'desc')->get();
        // dd($images);
        return view('dashboard_admin.wisata.galeri', compact('images', 'tourism'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                
                $imageName = Uuid::uuid4()->toString() . '.' . strtolower($file->getClientOriginalExtension());
                $path= 'images/wisata/'; 
                $imageUrl = $path.$imageName;
                $file->move($path,$imageName);
                // $image[] = $imageUrl;
                $TourismImage = new TourismImage;
                $TourismImage->tourism_id = $id;
                $TourismImage->image_url = $imageUrl;
                $TourismImage->save();
            }
        }
        return redirect('/dashboard/wisata/images/'.$id);
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
    public function show(TourismImage $tourismImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourismImage $tourismImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TourismImage $tourismImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tourism_id, $id)
    {
        $images = TourismImage::find($id);
        unlink($images->image_url);
        $images->delete();
        return redirect('/dashboard/wisata/images/'.$tourism_id);
    }
}