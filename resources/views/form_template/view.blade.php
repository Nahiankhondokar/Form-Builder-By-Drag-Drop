@extends('layouts.app')

@section('content')
<div class="category-store w-50 m-auto border p-2 mt-5">
    <h4 class="text-center">Template View</h4>
  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Form HTML</label>
            <textarea name="" id="" cols="65" rows="10" readonly>
                {{$template->form_template}}
            </textarea>
            
        </div>

</div>
@endsection