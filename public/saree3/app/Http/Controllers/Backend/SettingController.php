<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::whereIn('type',[0,1,2])->get();
        return view('backend.settings', compact('settings'));
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
    public function update(Request $request) {
       // dd(Request()->all());

		$validation = Validator::make($request->all(), [
			'facebook' 	=> 'max:1000',
			'twitter' 	=> 'max:1000',
			'lng' 		=> 'max:5000',
			'lat' 		=> 'max:5000',
			'postal' 	=> 'max:150',
			'address' 	=> 'max:500',
			'phone' 	=> 'max:20',
			'admin_url' => 'max:500',
			'email' 	=> 'max:500',
			'statue' 	=> 'in:online,offline',
			'logo' 		=> 'mimes:jpeg,png,jpg',
			'copyright' => 'max:5000',
			'analytics' => 'max:50000',
			'description' => 'max:30000',
			'site_meta_description' => 'max:30000',
			'site_title_ar' => 'max:1000',
			'site_title_en' => 'max:1000',
		]);

		if ($validation->fails()) {
			return back()->withInput()->withErrors($validation->errors());
		}

         foreach (array_except(Request()->toArray() , ['_token','submit','logo']) as $key => $req) {
             
             $sitesupdate = Setting::where('set_name', $key)->first();
            // dd($sitesupdate->fill([ 'value' => $req ])->save());
            if ($req != null and $sitesupdate != null){
                $sitesupdate->fill([ 'value' => $req ])->save();
            }
            
         }
        
        // Update Logo Of WebSite :
        
        $logo = Request('logo');
        if($logo != null) {
            $ext  = $logo->extension(); //extention

            $logoName = time().'.'.$logo->getClientOriginalExtension();
    
            $logo->move(public_path('images'), $logoName);
            
            $sitesupdate = Setting::where('set_name', 'logo')->first();
            $sitesupdate->fill([ 'value' => $logoName ])->save();
    
        }

        return redirect()->route('backend.settings')->with('doneMessage', "تم تحديت إعدادات الموقع");

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

