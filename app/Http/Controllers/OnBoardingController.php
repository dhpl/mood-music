<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OnBoarding;

class OnBoardingController extends Controller
{
    function create(Request $request)
    {
        // $validated = $request->validated();
        // var_dump($request->all());
        $onBoarding = new OnBoarding();
        $onBoarding->title = $request->title;
        $onBoarding->description = $request->description;
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/galeryImages/');
        $image->move($destinationPath, $imageName);
        $onBoarding->image_name = $imageName;
        $onBoarding->show = $request->has('show');
        $onBoarding->save();
        return back()->with('success', 'Create On Boarding Success!!!');
    }
}
