@extends('layouts.app')

@section('title','Social')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('social.create') }}" class="btn btn-info">Add A New Social Link</a>
                    @if(session('successMsg'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('successMsg') }}</span>
                        </div>
                    @endif
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Google Plus</th>
                                    <th>LinkedIn</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($socials as $social)
                                        <tr>
                                            <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Facebook</h3>
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Twitter</h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Google Plus</h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>LinkedIn</h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('social.edit',$social->id)}}" class="btn btn-info btn-sm"><i class="material-icons">
                                                        edit
                                                    </i></a>
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
    </div>

@endsection

@push('scripts')

@endpush