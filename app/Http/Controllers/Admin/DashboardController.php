<?php

namespace App\Http\Controllers\Admin;

use App\SiteLogo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallary;
use Response;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function gallary()
    {
        $user = Auth::user();
        $gallaries = Gallary::all();
        return view('admin.gallary', compact('user', 'gallaries'));
    }

    public function addGallary(Request $request)
    {
        $rules = [
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $profileImage = $request->file('image');
            $profileName = time() . 'gallary.' . $profileImage->getClientOriginalExtension();
            Storage::disk('public')->put($profileName,  File::get($profileImage));
            $requestData['image'] =  $profileName;
            //dd($requestData);
            $gallary = Gallary::create($requestData);
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);

            //     dd($path);
            return Redirect::route('admin.gallary')->with('success', 'Gallary added successfully!');
        }
    }

    public function editGallary(Request $request)
    {
        $rules = [
            'gallary_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $gallary = Gallary::find($request->gallary_id);
            if ($request->image) {
                $profileImage = $request->file('image');
                $profileName = time() . 'gallary.' . $profileImage->getClientOriginalExtension();
                Storage::disk('public')->put($profileName,  File::get($profileImage));
                $gallary->image =  $profileName;
                $gallary->save();
            }
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);

            //     dd($path);
            return Redirect::route('admin.gallary')->with('success', 'Gallary update successfully!');
        }
    }

    public function deleteGallary($id)
    {
        Gallary::where('id', $id)->delete();
        return Redirect::route('admin.gallary')->with('success', 'Gallary deleted successfully!');
    }

    public function logout()
    {
        $user = Auth::logout();
        return redirect()->back();
    }
}
