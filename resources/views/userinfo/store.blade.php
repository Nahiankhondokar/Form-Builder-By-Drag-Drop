@extends('layouts.app')

@section('content')
<div class="category-store w-50 m-auto border p-2 mt-5">
    <h4 class="text-center">User Data Collection Form</h4>
    <form method="POST" action="{{route('info.store')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
              @if($errors->has('email'))
                  <div class="error text-danger">{{ $errors->first('email') }}</div>
              @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" >
              @if($errors->has('phone'))
                  <div class="error text-danger">{{ $errors->first('phone') }}</div>
              @endif
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category Name</label>
            <select name="category_id" id="" class="block mt-1 form-control">
                <option value="">--Select--</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
              @if($errors->has('category_id'))
                  <div class="error text-danger">{{ $errors->first('category_id') }}</div>
              @endif
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label d-block">Additional Data</label>
            <textarea name="extra_data" id="" cols="30" rows="10" class="w-100"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection