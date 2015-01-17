@if(count($errors))
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $e)
    <p>{{ $e }}</p>
    @endforeach
</div>
@elseif($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{ $message }}</p>
</div>
@endif