{{-- slider -> create.blade.php page message --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span>{{ $error }}</span>
        </div>
    @endforeach
@endif

