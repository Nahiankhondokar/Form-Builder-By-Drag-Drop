
<div class="category-table m-5">
    <table class="table table-striped border text-center">
        
        <h2 class="text-center">Category list</h2>
        @can('organizer')
            <a href="" class="btn btn-sm btn-info header_btn">Create</a>
        @endcan
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Organizer</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories as $key => $category)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->user->name ?? 'None'}}</td>
            <td>
                <a href="" class="btn btn-sm btn-primary">View</a>
                @can('organizer')
                <a href="" class="btn btn-sm btn-danger">Delete</a>
                @endcan
            </td>
          </tr>
          @empty
              <tr>
                <td colspan="4">Not Found !</td>
              </tr>
          @endforelse
          
        </tbody>
    </table>
</div>
