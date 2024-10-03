

<div class="template-table m-5">
  <table class="table table-striped border text-center">
      
      <h2 class="text-center">Template list</h2>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Organizer</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($templates as $key => $template)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$template->name}}</td>
          <td>{{$template->user->name ?? 'None'}}</td>
          <td>
              <a href="{{route('template.show', $template->id)}}" class="btn btn-sm btn-primary">View</a>
              @can('organizer')
              <a href="{{route('template.delete', $template->id)}}" class="btn btn-sm btn-danger">Delete</a>
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