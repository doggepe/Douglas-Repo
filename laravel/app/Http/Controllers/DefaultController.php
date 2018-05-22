<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Ad;
use App\Category;

class DefaultController extends Controller
{
    public function index(){
    	$title         = "Uppdraget.io | Skapa annons";
    	$cities        = $this->get_all_cities();
        $categories    = $this->get_all_categories();

    	return view('pages.create_ad', compact('title', 'cities', 'categories'));
    }

    public function load_search_page(){
        return view('pages.search')->with('title', 'Uppdraget.io | Sök');
    }

    public function load_ads_home(){
    	$title         = "Uppdraget.io";
        $cities        = $this->get_all_cities();
        $categories    = $this->get_all_categories();
    	$pop_ads       = Ad::where('deleted', '0')->orderby('click_count', 'DESC')->limit('5')->get();
        $new_ads       = Ad::where('deleted', '0')->orderby('created_at', 'DESC')->limit('6')->get();

    	return view('pages.home', compact('title', 'pop_ads', 'new_ads', 'categories', 'cities'));
    }

    public function show_ad_uploaded(Request $request){
        $title      = "Uppdraget.io | Annons uppladdad";
        $id         = $request->id;
        $current_ad = Ad::where('id', $id)->first();

        return view('pages.ad_uploaded')->with('title', $title)->with('ad', $current_ad);
    }

    public function get_cities($query = "")
    {
        $cities = City::select('name', 'id')->where('name', 'LIKE', '%' . $query . '%')->get();
        return \Response::json($cities);
    }

    public function get_categories()
    {
        $categories = Category::select('name', 'id')->get();
        return \Response::json($categories);
    }

    public function get_all_cities()
    {
        $cities = City::all();
        return $cities;
    }

    public function get_all_categories()
    {
        $categories = Category::all();
        return $categories;
    }
}
