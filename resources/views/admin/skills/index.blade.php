@extends('admin.layouts.master')

@section('title','Skill')
@section('page_title','Skill list')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 class="text-primary">Skills</h5>
                                    <p class="text-info">See your Skills</p>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="text-dark">Sl.</th>
                                        <th class="text-dark">Name</th>
                                        <th class="text-dark">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0 @endphp
                                    @foreach($skills as $skill)
                                        <tr>
                                            <td class="text-dark">{{ sprintf('%02d',++$i) }}</td>
                                            <td>{{ $skill->title }}</td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><a href="{{ url('admin/skills/'.$skill->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-user-edit"></i></a> </li>
                                                    <li class="list-inline-item">
                                                        <form class="" action="{{ url('admin/skills/'.$skill->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you want to delete  {{$skill->title}}?')"><i class="fas fa-user-times"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 class="text-primary">Create Skill</h5>
                                    <p class="text-info">New skill</p>
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
        $('#dataTable').dataTable( {//hide length of showing entities on data table
            "lengthChange": false
        } );
    </script>
@endpush
