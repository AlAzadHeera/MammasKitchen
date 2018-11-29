@extends('layouts.app')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Category/Item</p>
                            <h3 class="card-title">{{ $category }}/{{$item}}
                                <small></small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#">Total Categories And Items</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">slideshow</i>
                            </div>
                            <p class="card-category">Sliders</p>
                            <h3 class="card-title">{{ $slider }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> <a href="{{ route('slider.index') }}">Get Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Reservation</p>
                            <h3 class="card-title">{{ $reservations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Not Confirmed Reservation
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Messages</p>
                            <h3 class="card-title">{{ $message }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservation</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>
                                                @if($reservation->status == true)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Confirmed</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($reservation->status == false)
                                                    <form method="post" id="confirm-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}" style="display:none">
                                                        @csrf
                                                    </form>
                                                    <button class="btn btn-success btn-sm" onclick="if (confirm('Are You Sure?')){
                                                            event.preventDefault();
                                                            getElementById('confirm-form-{{ $reservation->id }}').submit()
                                                            }else{ preventDefault(); } "><i class="material-icons">
                                                            done
                                                        </i></button>
                                                @endif

                                                <form method="post" id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.delete',$reservation->id) }}" style="display:none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button class="btn btn-danger btn-sm" onclick="if (confirm('Are You Sure?')){
                                                        event.preventDefault();
                                                        getElementById('delete-form-{{$reservation->id}}').submit()
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