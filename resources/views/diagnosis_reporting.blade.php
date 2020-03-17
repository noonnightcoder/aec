@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
	</style>
@stop


@section('page_header')
    <h1 class="page-title">
      Diagnosis Report
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" action="{{url('admin/export/diagnosis')}}" method="POST">
                       
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
								<div class="row">
								<div class="form-group  col-md-12 ">
                                        <label class="control-label" for="title">Title</label>
                                        <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Rerport Title" >
								</div>
								
								<div class="form-group  col-md-6 ">
                                        <label class="control-label" for="start">From</label>
                                        <input type="date" class="form-control" name="from" placeholder="From" value="{{old('from')}}" >
								</div>
								<div class="form-group  col-md-6 ">
                                        <label class="control-label" for="to">To</label>
                                        <input type="date" class="form-control" name="to" placeholder="To" value="{{old('to')}}" >
								</div>
								</div>
								
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
					
                                <button type="submit" class="btn btn-primary save">Export</button>
						
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                   

                </div>
            </div>
        </div>
    </div>

    
@stop

@section('javascript')
    <script>

    </script> 
@stop
