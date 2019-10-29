@if(count($errors))

    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

@endif

@if(session()->has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
@endif
