<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    const UPLOAD_DIR = '/uploads/profile_image/';
    const UPLOAD_DIR1 = '/uploads/profile_banner/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = Profile::where('user_id',auth()->user()->id)->first();

        if(!empty($profile))
            return view('admin.profiles.edit',compact('profile'));
        else
            $user = Auth::user();

            return view('admin.profiles.create',compact('user'));

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
            dd('hi');
        }else{
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:11|max:11|unique:profiles,mobile',
                'email' => 'required|email|unique:profiles,email',
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

    private function upload($file, $title='')
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$title .'.'. $file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save(public_path() . self::UPLOAD_DIR . $file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        if ($file != '' && file_exists(public_path() . self::UPLOAD_DIR . $file)) {
            @unlink(public_path() . self::UPLOAD_DIR . $file);
        }
    }

    private function upload1($file, $title='')
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $file_name = $timestamp .'-'.$title .'.'. $file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save(public_path() . self::UPLOAD_DIR1 . $file_name);
        return $file_name;
    }

    private function unlink1($file)
    {
        if ($file != '' && file_exists(public_path() . self::UPLOAD_DIR1 . $file)) {
            @unlink(public_path() . self::UPLOAD_DIR1 . $file);
        }
    }
}