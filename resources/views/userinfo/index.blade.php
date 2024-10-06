@extends('layouts.app')

@section('content')

<div class="route-table m-5">
    <table class="table table-striped border text-center">
        
        <h2 class="text-center">User Data List</h2>
        @can('organizer')
            <a href="{{route('info.create')}}" class="btn btn-sm btn-info header_btn">Create</a>
        @endcan
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Extra Data</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($userDatas as $key => $data)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->user->name ?? 'None'}}</td>
            <td>{{$data->email ?? 'None'}}</td>
            <td>{{$data->phone ?? 'None'}}</td>
            <td>{{$data->extra_data ?? 'None'}}</td>
            <td>
                @can('organizer')
                  <a href="{{route('route.delete', $data->id)}}" class="btn btn-sm btn-danger">Delete</a>
                @elsecan('user')
                  <p class="text-danger">No permission</p>
                @endcan
            </td>
          </tr>
          @empty
              <tr>
                <td class="text-danger fw-bold" colspan="7">Not Found !</td>
              </tr>
          @endforelse
          
        </tbody>
    </table>
  </div>
  <hr>

  @include('category.index')
  
  @endsection