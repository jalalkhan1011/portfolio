@extends('admin.layouts.master')

@section('title','Skill')
@section('page_title','Skill list')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <router-view name="skillIndex"></router-view>
                </div>
            </div>
        </div>
    </section>
@endsection
