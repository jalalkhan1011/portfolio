@extends('admin.layouts.master')

@section('title','Profile')
@section('page_title','User Profile')

@section('content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 text-left">
                                <h5 class="text-primary">Profiles</h5>
                                <p class="text-info">See your profiles</p>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{ url('admin/profiles/create') }}" class="btn btn-sm btn-primary" title="Create New Profile"><i class="far fa-plus-square"></i> </a>
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
                            <table class="table table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-dark">Name</th>
                                        <th class="text-dark">Mobile</th>
                                        <th class="text-dark">Email</th>
                                        <th class="text-dark">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $profiles->first_name.' '.$profiles->last_name }}</td>
                                    <td>{{ $profiles->mobile }}</td>
                                    <td>{{ $profiles->email }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="" class="btn btn-sm btn-info" title="View"><i class="far fa-eye"></i></a> </li>
                                            <li class="list-inline-item"><a href="" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-user-edit"></i></a> </li>
                                            <li class="list-inline-item">
                                                <form class="" action="" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you want to delete {{ $profiles->first_name }} ?')"><i class="fas fa-user-times"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
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
    </script>
@endpush
