@extends('layouts.app')

@section('content')

<div class="short-url-table m-5">
    <div class="short-url-store w-25 m-auto border p-2 mt-5">
        <h4 class="text-center">URL short</h4>
        <form method="POST" action="{{route('url.store')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Original URL</label>
              <input type="text" class="form-control" name="original_url" aria-describedby="emailHelp">
                @if($errors->has('original_url'))
                    <div class="error text-danger">{{ $errors->first('original_url') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<br>
<br>
   @if (Session::has('original_url'))
    <div class="short-url-output m-auto" style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;">
        <div class="long_url">
        <span class="fw-bold">Long Url</span><br>
        <span class="text-dark fs-5 fw-bold">{{ session('original_url')  ?? 'Nothing'}}</span>
        </div>
        <div class="short_url">
        <span class="fw-bold">Short Url</span>
        <br>
        <a href="{{route('url.redirect', session('shortened_url') ?? '')}}" class="text-success fs-5 fw-bold" target="_blank">
            {{ session('shortened_url')  ? url('/') . '/' .session('shortened_url') : 'Nothing'}}
        </a>
        </div>
    </div>
   @endif
  </div>
  <hr>
  
@endsection