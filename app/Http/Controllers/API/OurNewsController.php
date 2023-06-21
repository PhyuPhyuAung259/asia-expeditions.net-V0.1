<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tour;
use App\Country;
use App\Category;
use App\Business;
use App\CountView;
use App\component\Content;
class OurNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        $category_data = [];
        $tour_category = Tour::where(['post_type'=>1, 'tour_status'=>1, 'web'=>1])
                ->whereNotIn('id', [$tour['id']])->orderByRaw('RAND()')->orderBy('id', 'DESC')->paginate(6);
        if($tour_category->count() > 0){
            foreach ($tour_category as $key => $value) {              
                $category_data[] = [
                    'Id'        => $value->id,                    
                    'index'     => $key,
                    'duration'  => $value->tour_daynight,
                    'slug'      => $value->slug,
                    'title'     => $value->tour_name, 
                    'tour_desc' => $value->tour_desc,
                    'country'   => $value->country['country_name'],
                    'province'  => $value->province['province_name'],
                    'price'     => Content::money($value->tour_price)." ".Content::currency(), 
                    'photo'     => Content::urlthumbnail($value->tour_photo), 
                    'gallery'   => trim($value->tour_picture, '|'), 
                ];
            }
        }
        $gallery = '';
        $gallery[] = ['original'=>Content::urlImage($tour->tour_photo), 'thumbnail'=>Content::urlthumbnail($tour->tour_photo)]; 
        $tour_gallery = explode("|", trim($tour->tour_picture, '|'));
        if (!empty($tour->tour_picture)) {
            foreach ($tour_gallery as $key => $gl) {
                $gallery[] = ['original'=>Content::urlImage($gl), 'thumbnail'=>Content::urlthumbnail($gl)];
            }            
        }

        $jsonData = [
            'Id'    => $tour->id, 
            'slug'  => $tour->slug,
            'title' => $tour->tour_name, 
            'publish_date' => date('F m Y', strtotime($tour->updated_at)),
            'price' => Content::money($tour->tour_price)." ".Content::currency(), 
            'photo' => Content::urlImage($tour->tour_photo), 
            'images'=> $gallery, 
            'tour_desc' => $tour->tour_desc,
            'tour_category'=>$category_data
        ];        
        return response()->json($jsonData)->header("Access-Control-Allow-Origin",  "*");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
