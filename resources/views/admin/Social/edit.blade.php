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
                                        <tr>
                                            <form method="post" action="{{route('social.update',$social->id)}}">
                                                @csrf
                                                @method('put')
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Facebook</label>
                                                            <input type="text" class="form-control" name="facebook" value="{{$social->facebook}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Twitter</label>
                                                            <input type="text" class="form-control" name="twitter" value="{{$social->twitter}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Google Plus</label>
                                                            <input type="text" class="form-control" name="gp" value="{{$social->gp}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">LinkedIn</label>
                                                            <input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="{{route('social.index')}}" class="btn btn-danger">Back</a>
                                                </td>
                                            </form>
                                        </tr>
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