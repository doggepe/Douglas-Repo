<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Ad;
use App\City;
use App\Category;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $title      = $request->post_title;
        $slug_title = str_replace(['.', ',', ' ', '/', ':','. ', ', ', '/ ', ': '], '-', $title);

        $file = $request->file('company_logo');

        $preview = new Ad();

        if($file != NULL){

            $name = time() . $file->getClientOriginalName();

            $img  = \Image::make($file);

            $img->resize(null, 150, function($constraint){
                $constraint->aspectRatio();
            });

            $img->save(public_path('uploads/'.$name));

            $img_path = public_path('uploads/'.$name);

            $preview->company_logo_name = $name;
            $preview->company_logo_path = $img_path;
        }

        $preview->post_title        = $request->post_title;
        $preview->slug_title        = $slug_title;
        $preview->post_body         = $request->post_body;
        $preview->category          = $request->category;
        $preview->company_email     = $request->company_email;
        $preview->company_name      = $request->company_name;
        $preview->company_location  = $request->city_id;
        $preview->company_website   = $request->company_website;
        $preview->company_facebook  = $request->company_facebook;
        $preview->expiration_date   = $request->expiration_date;
        $preview->apply_website     = $request->apply_website;
        $preview->apply_email       = $request->apply_email;
        $preview->apply_reference   = $request->apply_reference;
        $preview->deleted           = 0;

        $preview->save();
        $previewData = Ad::latest('id')->first();
        $cities = City::all();
        $title = 'Uppdraget.io | ' . $previewData->post_title;
        return view('pages.preview_ad', compact('title', 'previewData', 'cities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $adtitle = "")
    {
        $adData = Ad::where('id', $id)->first();
        $alikeData = Ad::where('category', $adData->category)->orderby('click_count', 'DESC')->limit(5)->get();
        $cities = City::all();
        $title = 'Uppdraget.io | ' . $adtitle;
        $categories = Category::all();

        $clickcount = $adData->click_count;
        $new_clickcount = $clickcount + 1;

        $adData->click_count = $new_clickcount;
        $adData->save();


        if(empty($adData)){
            return redirect('/');
        }

        return view('pages.view_ad', compact('title', 'adData', 'cities', 'alikeData', 'categories'));
    }

    public function search_ads(Request $request)
    {

        $freetext       = $request->freetext;
        $category_noarg = $request->category;
        $city_noarg     = str_replace('"', ' ', $request->city_name);
        
        $city_arg = array_map('intval', explode(',', $city_noarg));
        $category_arg = array_map('intval', explode(',', $category_noarg));

        $query = \DB::table('ads');

        if($freetext){
            $query->where('post_title', 'LIKE', '%' . $freetext . '%');
        }
        if(!in_array(0, $category_arg, true)){
            $category = array_values($category_arg);
            \Log::info('category');
            \Log::info($category);
            $query->whereIn('category', $category);
        }
        if(!in_array(0, $city_arg, true)){
            $city = array_values($city_arg);
            \Log::info('city');
            \Log::info($city);
            $query->whereIn('company_location', $city);
        }

        $ads = $query->get();

        $title    = 'Uppdraget.io | Alla annonser';

        $ad_html  = \View::make('includes.all_ads', compact('ads'))->render();

        $data     = [
            'ad_html' => $ad_html,
            'title'   => $title,
        ];

        echo json_encode($data);
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

    public function edit_preview(Request $request)
    {
        $previewData = Ad::where('id', $request->id)->first();
        $cities = City::all();
        $categories = Category::all();
        $title = ' | Skapa annons';

        $ad = Ad::find($request->id);
        $ad->delete();

        if(empty($previewData)){
            return redirect('/Skapa-annons');
        }

        return view('pages.edit_preview_ad', compact('previewData', 'cities', 'title', 'categories'));
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
