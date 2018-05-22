<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Preview;
use App\City;

class PreviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previewData = Preview::latest('id')->first();
        return view('pages.preview_ad')->with('previewData', $previewData);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preview = new Preview();
        $preview->post_title = $request->title;
        $preview->save();
        $previewData = Preview::latest('id')->first();
        return view('pages.preview_ad')->with('previewData', $previewData);
        //return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $previewData = Preview::where('id', $request->id)->first();
        $cities = City::all();
        $categories = get_all_categories();
        $title = 'Uppdraget.io | Skapa annons';

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
