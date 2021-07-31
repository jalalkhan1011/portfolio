@extends('admin.layouts.master')

@section('title','Profile')
@section('page_title','Create Profile')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 class="text-primary">Create Profile</h5>
                                    <p class="text-info">New profile</p>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a href="{{ url('admin/profiles') }}" class="btn btn-sm btn-warning" title="Back"><i class="fas fa-arrow-alt-circle-left"></i> </a>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            @if(session('message'))
                                <div class="alert {{ Session('alert-class','alert-success','alert-block') }}">
                                    <button type="button" class="close" data-dissmiss="alert">x</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                                <form action="{{ url('admin/profiles') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="profile_image">profile Image</label>
                                                    <img id="profile_image" class="image-preview" src="{{ asset('default/Profile_avatar.png') }}">
                                                    <input type="file" class="pt-1" name="profile_image"  onchange="loadFile()">
                                                    @if($errors->has('profile_image'))
                                                        <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('profile_image') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="profile_banner">profile Banner</label>
                                                    <img id="profile_banner" class="image-preview" src="{{ asset('default/banner_preview.png') }}">
                                                    <input type="file" class="pt-1" name="profile_banner" onchange="loadFile1()">
                                                    @if($errors->has('profile_banner'))
                                                        <span class="form-text">
                                                            <strong class="text-danger form-control-sm">{{ $errors->first('profile_banner') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="first_name">First Name<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control form-control-sm" name="first_name" value="{{ old('first_name') }}" placeholder="Ex: John" required>
                                            @if($errors->has('first_name'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="last_name">Last Name<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control form-control-sm" name="last_name" value="{{ old('last_name') }}" placeholder="Ex: Doe" required>
                                            @if($errors->has('last_name'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="mobile">Mobile<span class="text-danger">*</span> </label>
                                            <input type="number" minlength="11" maxlength="11" class="form-control form-control-sm" name="mobile" value="{{ old('mobile') }}" placeholder="Ex: 01XXX-XXXXXX" required>
                                            @if($errors->has('mobile'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="email">E-mail<span class="text-danger">*</span> </label>
                                            <input type="email" class="form-control form-control-sm" name="email" value="{{ old('email',$user->email) }}" placeholder="Ex: exemple@exemple.com" required>
                                            @if($errors->has('email'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="facebook">Facebook<span class="text-danger">*</span> </label>
                                            <input type="url" class="form-control form-control-sm" name="facebook" value="{{ old('facebook') }}" placeholder="Ex: https://www.facebook.com/jondoe.jondoe1011" >
                                            @if($errors->has('facebook'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('facebook') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="github">Github<span class="text-danger">*</span> </label>
                                            <input type="url" class="form-control form-control-sm" name="github" value="{{ old('github') }}" placeholder="Ex: https://github.com/jondoe1011" >
                                            @if($errors->has('github'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('github') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="twitter">Twitter<span class="text-danger">*</span> </label>
                                            <input type="url" class="form-control form-control-sm" name="twitter" value="{{ old('twitter') }}" placeholder="Ex: https://twitter.com/" >
                                            @if($errors->has('twitter'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('twitter') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="address">Address<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control form-control-sm" name="address" value="{{ old('address') }}" placeholder="Ex: 1/2,rod-101,washington DC" >
                                            @if($errors->has('address'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="about">About<span class="text-danger"></span> </label>
                                            <textarea  class="form-control form-control-sm" name="about"  placeholder="Write something about yours..." rows="10"></textarea>
                                            @if($errors->has('about'))
                                                <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('about') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        var loadFile = function () {
            var profile_image = document.getElementById('profile_image');
            profile_image.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadFile1 = function () {
            var profile_banner = document.getElementById('profile_banner');
            profile_banner.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
