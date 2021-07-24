@extends('admin.layouts.master')

@section('title','projects')
@section('page_title','New projects')

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
                                    <a href="{{ url('admin/projects') }}" class="btn btn-sm btn-warning" title="Back"><i class="fas fa-arrow-alt-circle-left"></i> </a>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            @if(session('message'))
                                <div class="alert {{ Session('alert-class','alert-success','alert-block') }}">
                                    <button type="button" class="close" data-dissmiss="alert">x</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <form action="{{ url('admin/projects') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="image">Project Image</label>
                                                <img id="image" class="image-preview" src="{{ asset('default/banner_preview.png') }}">
                                                <input type="file" class="pt-1" name="image"  onchange="loadFile()">
                                                @if($errors->has('image'))
                                                    <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="title">Title<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control form-control-sm" name="title" value="{{ old('title') }}" placeholder="Ex: Management software" required>
                                        @if($errors->has('title'))
                                            <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('title') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="description">Description<span class="text-danger">*</span> </label>
                                        <textarea  class="form-control form-control-sm" name="description" value="{{ old('description') }}" placeholder="Write short note about project...." required rows="10"></textarea>
                                        @if($errors->has('description'))
                                            <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('description') }}</strong>
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
            var profile_image = document.getElementById('image');
            profile_image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
