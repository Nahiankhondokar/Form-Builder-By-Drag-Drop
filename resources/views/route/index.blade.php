
<div class="route-table m-5">
  <table class="table table-striped border text-center">
      
      <h2 class="text-center">Route Name List</h2>
      @can('organizer')
          <a href="{{route('route.index')}}" class="btn btn-sm btn-info header_btn">Create</a>
      @endcan
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">User</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($routes as $key => $route)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$route->name}}</td>
          <td>{{$route->user->name ?? 'None'}}</td>
          <td>
              @can('organizer')
                <a href="{{route('route.delete', $route->id)}}" class="btn btn-sm btn-danger">Delete</a>
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

@include('url.list')