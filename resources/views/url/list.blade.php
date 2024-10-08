
<div class="route-table m-5">
    <table class="table table-striped border text-center">
        
        <h2 class="text-center">Short URL List</h2>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Original URL</th>
            <th scope="col">Short URL</th>
            <th scope="col">Visited</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($urls as $key => $url)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>
                <a href="{{$url->original_url}}" class="fw-bold">{{$url->original_url ?? 'None'}}</a>
            </td>
            <td>
                <a href="{{route('url.redirect', $url->shortened_url ?? '')}}" class="text-success fs-5 fw-bold" target="_blank">
                    {{ $url->shortened_url ? url('/') . '/' .$url->shortened_url : 'Nothing'}}
             </td>
            <td>{{$url->count ?? 'None'}}</td>
            <td>{{$url->user->name ?? 'None'}}</td>
            <td>
                <a href="{{route('url.delete', $url->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
  