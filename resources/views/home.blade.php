@extends('admin.layouts.master')

@section('title','Dashboard')
@section('page_title','Portfolio')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Portfolio</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                 src="{{ !empty($project->image) ? asset('uploads/project_image/'.$project->image) : asset(asset('default/Profile_avatar.png')) }}" alt="...">
                        </div>
                        <p>{{ !empty($profile->about) ? $profile->about : 'About not found' }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


