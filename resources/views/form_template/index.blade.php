@extends('layouts.app')
@section('content')

@include('layouts.style')

    <div class="title-area m-3">
        <button style="cursor: pointer;display: none" class="btn btn-info export_html mt-2 pull-right">View HTML</button>

        <a href="" style="cursor: pointer;display: none; " id="download_html" class="btn btn-primary mt-2 pull-right mr-3">Store</a>
        
        <h3 class="mr-auto text-center">Drag & Drop Bootstrap Form Builder</h3>
        <hr>
        <div class="mb-3 w-50 m-auto d-flex justify-center gap-2">
            <div class="name-intpu">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control nameInput">
                <span class="name_error_msg text-danger"></span>
            </div>
            <div class="route-input">
                <label for="" class="form-label">Route Name <small>(text.index)</small></label>
                <select name="route_name" id="" class="block mt-1 form-control routeName">
                    <option value="">--Select--</option>
                    @foreach ($routes as $route)
                    <option value="{{$route->id}}">{{$route->name}}</option>
                    @endforeach
                </select>
                <span class="route_error_msg text-danger"></span>
            </div>
            <div class="route-input m-auto">
                <a href="{{route('route.index')}}" class="btn btn-sm btn-info text-white fw-bold ">Add Name Route</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form_builder" style="margin-top: 25px">
        
        <div class="row">
            <div class="col-sm-2">
                <nav class="nav-sidebar">
                    <ul class="nav">
                        <li class="form_bal_textfield">
                            <a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_textarea">
                            <a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_select">
                            <a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_radio">
                            <a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_checkbox">
                            <a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_email">
                            <a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_number">
                            <a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_password">
                            <a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_date">
                            <a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                        <li class="form_bal_button">
                            <a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-5 bal_builder">
                <div class="form_builder_area"></div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12">
                    <form class="form-horizontal">
                        <div class="preview"></div>
                        <div style="display: none" class="form-group plain_html">
                            <textarea rows="50" class="form-control">
                                
                            </textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
@include('layouts.script')


@endsection