<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlasmaController extends Controller
{
    public function plasmaDashboard(){
        return view('web.plasma.admin.dashboard');
    }
    public function plasmaTestimonialsStore(Request $request){
        set_option('testimonials_enable', $request->testimonials_enable);
        $data = [];
        foreach ($request->text as $index=>$text){
            $data[] = [
                'text'  =>$request->text[$index],
                'avatar'=>$request->avatar[$index],
                'name'  =>$request->name[$index]
            ];
        }

        set_option('testimonials_items',json_encode($data));
        return back();
    }
}
