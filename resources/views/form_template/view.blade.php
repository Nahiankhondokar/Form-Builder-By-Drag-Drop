@extends('layouts.app')

@section('content')
<div class="category-store w-50 m-auto border p-2 mt-5">
    <h4 class="text-center">Template View</h4>

        <div class="container">
            <form action="{{route($template->route ?? '')}}" method="POST">
                @csrf
                {!! $template->form_template !!}
            </form>
        </div>

</div>
@endsection