@extends('layouts.app')

@section('content')
<div class="category-store w-25 m-auto border p-2 mt-5">
    <h4 class="text-center">Route Name Create</h4>
    <form method="POST" action="{{route('route.store')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Route Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection