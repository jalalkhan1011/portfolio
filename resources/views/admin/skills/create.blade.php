@extends('admin.layouts.master')

@section('title','Skill')
@section('page_title','Skill list')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 class="text-primary">Create Skill</h5>
                                    <p class="text-info">New skill</p>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a href="{{ url('admin/skills') }}" class="btn btn-sm btn-warning" title="Back"><i class="fas fa-arrow-alt-circle-left"></i> </a>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            @if(session('message'))
                                <div class="alert {{ Session('alert-class','alert-success','alert-block') }}">
                                    <button type="button" class="close" data-dissmiss="alert">x</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <form action="{{ url('admin/skills') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="title">Title<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control form-control-sm" name="title" value="{{ old('title') }}" placeholder="Ex: Web development" required>
                                        @if($errors->has('title'))
                                            <span class="form-text">
                                                    <strong class="text-danger form-control-sm">{{ $errors->first('title') }}</strong>
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
        $("document").ready(function (){
            setTimeout(function (){
                $('.alert').fadeOut('slow');
            },3000);
        });
    </script>
@endpush
