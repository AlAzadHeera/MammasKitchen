@extends('layouts.app')

@section('title','Reservation')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class="btn btn-info">Create A New Slider</a>
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
                            <h4 class="card-title ">All Sliders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped" width="100%" cellspacing="0">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Time And Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$reservation->name}}</td>
                                        <td>{{$reservation->phone}}</td>
                                        <td>{{$reservation->email}}</td>
                                        <td>{{$reservation->date_and_time}}</td>
                                        <td>{{$reservation->message}}</td>
                                        <td>
                                            @if($reservation->status == true)
                                                <span class="badge badge-green">Confirmed</span>
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
                                                        getElementById('delete-form-{{$reservation->id}}').submit()
                                                        }else{ preventDefault(); } "><i class="material-icons">
                                                        done
                                                    </i></button>
                                            @endif

                                            <form method="post" id="delete-form-{{ $reservation->id }}" action="" style="display:none">
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