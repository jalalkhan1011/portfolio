<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTraits;
use App\Models\Profile;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ImageTraits;

    const UPLOAD_DIR = '/uploads/profile_image/';
    const UPLOAD_DIR1 = '/uploads/profile_banner/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where('user_id',auth()->user()->id)->first();

        if(!empty($profile))
            return view('admin.profiles.edit',compact('profile'));
        else
            $user = Auth::user();

        return view('admin.profiles.create',compact('user'));
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
        $profile = Profile::where('user_id',auth()->user()->id)->first();

        if($profile){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:11|max:11|unique:profiles,mobile,'.$profile->id,
                'email' => 'required|email|unique:profiles,email,'.$profile->id,
                'profile_image' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $data = $request->all();
            $data['user_id'] = auth()->user()->id;

            if($request->hasFile('profile_image')){
                $this->unlink($profile->profile_image);
                $data['profile_image'] = $this->upload($request->profile_image,'profile_image');
            }
            if($request->hasFile('profile_banner')){
                $this->unlink1($profile->profile_banner);
                $data['profile_banner'] = $this->upload1($request->profile_banner,'profile_banner');
            }

            $profile->update($data);

            session()->flash('message','Profile updated successfully!');
            session()->flash('alert-class','alert-success');

            return back();
        }else{
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:11|max:11|unique:profiles,mobile',
                'email' => 'required|email|unique:profiles,email',
                'profile_image' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $data = $request->all();
            $data['user_id'] = auth()->user()->id;

            if($request->hasFile('profile_image')){
                $data['profile_image'] = $this->upload($request->profile_image, 'profile_image');
            }
            if($request->hasFile('profile_banner')){
                $data['profile_banner'] = $this->upload1($request->profile_banner, 'profile_banner');
            }

             Profile::create($data);

            session()->flash('message','Profile created successfully!');
            session()->flash('alert-class','alert-success');

            return redirect('admin/profiles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }


}
