@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form method="post" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Sub Title</label>
                                                <input type="text" class="form-control" name="sub_title" value="{{$slider->sub_title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" name="image">
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                                </form>
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