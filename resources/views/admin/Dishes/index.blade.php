@extends('layouts.app')

@section('title','Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('item.create')}}" class="btn btn-info">Add A New Item</a>
                    @if(session('successMsg'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('successMsg') }}</span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key=>$item)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td width="20%"><img class="img-responsive img-thumbnail" src="{{asset('uploads/item/'.$item->image)}}" alt="default.png"></td>
                                        <td>{{$item->description}}</td>
                                        <td>${{$item->price}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>
                                            <a href="{{route('item.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">
                                                    edit
                                                </i></a>
                                            <form method="post" id="delete-form-{{ $item->id }}" action="{{route('item.destroy',$item->id)}} " style="display:none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button class="btn btn-danger btn-sm" onclick="if (confirm('Are You Sure?')){
                                                event.preventDefault();
                                                getElementById('delete-form-{{$item->id}}').submit()
                                            }else{ preventDefault(); } "><i class="material-icons">
                                                    delete_forever
                                                </i></button>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        } );
    </script>
@endpush