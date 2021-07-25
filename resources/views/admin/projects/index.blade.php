@extends('admin.layouts.master')

@section('title','Projects')
@section('page_title','User projects')

@section('content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 class="text-primary">Projects</h5>
                                    <p class="text-info">See your projects</p>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a href="{{ url('admin/projects/create') }}" class="btn btn-sm btn-primary" title="Create New Profile or edit"><i class="far fa-plus-square"></i> </a>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            @if(session('message'))
                                <div class="alert {{ Session('alert-class','alert-success','alert-block') }}">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="text-dark">Sl.</th>
                                        <th class="text-dark">Title</th>
                                        <th class="text-dark">Description</th>
                                        <th class="text-dark">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0 @endphp
                                    @foreach($projects as $project)
                                        <tr>
                                            <td class="text-dark">{{ sprintf('%02d',++$i) }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($project->description,50) }}</td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><a href="" class="btn btn-sm btn-info" title="View"><i class="far fa-eye"></i></a> </li>
                                                    <li class="list-inline-item"><a href="{{ url('admin/projects/'.$project->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-user-edit"></i></a> </li>
                                                    <li class="list-inline-item">
                                                        <form class="" action="{{ url('admin/projects/'.$project->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you want to delete  {{$project->title}}?')"><i class="fas fa-user-times"></i></button>
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
        $('#dataTable').dataTable( {
            "lengthChange": false
        } );
    </script>
@endpush
