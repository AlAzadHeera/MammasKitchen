@extends('layouts.app')

@section('title','Item')

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
                            <h4 class="card-title ">Add New Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form id="uploadImage" method="post" action="{{route('dish.update',$dishes->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $dishes->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div id="targetLayer" style="display:none"></div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('dish.index')}}" class="btn btn-danger">Back</a>
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
    <script>
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploadImage + img').remove();
                    $('#uploadImage').after('<img class="img-thumbnail" src="'+e.target.result+'" width="350" height="200"/>');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function () {
            filePreview(this);
        });
    </script>
@endpush