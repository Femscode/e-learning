@extends('admin.adminmaster')
@section('header')
{{-- <h5>All Users</h5> --}}
@stop
@section('subheader')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-success">
    <strong>{{Session::get('message')}}</strong> 
   
</div>
@endif
@stop
@section('content')
<h2>Edit Test</h2>
<div class="nk-block nk-block-lg">

    <form action="{{route('test.update',[$test->id])}}" method="POST"
        enctype='multipart/form-data'>@csrf
        {{method_field('PUT')}}

        <div class="module">
            

            <div class="module-body">
                <div class="control-group">
                    <label class="control-lable" for="name">Test name</label>
                    <div class="controls">
                        <input required type="text" name="name"
                            class="form-control @error('name') border-red @enderror"
                            placeholder="name of a test" value="{{$test->name}}  ">
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="control-group">
                    <label class="control-lable" for="name">Description</label>
                    <div class="controls">
                        <textarea required name="description"
                            class="form-control @error('description') is-invalid @enderror"> {{$test->description}}   </textarea>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="control-group">
                    <label class="form-label" for="name">Time(in minute)</label>
                    <div class="controls">
                        <input required type="text" name="minutes"
                            class="form-control @error('minutes') is-invalid @enderror"
                            placeholder="Duration of a test" value="{{$test->minutes}} ">
                    </div>
                    @error('minutes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="control-group">
                    <label class="form-label" for="name">Image(Optional)</label>
                    <div class="controls">
                        <input accept='image/*' type="file" name="image"
                            class="form-control @error('image') is-invalid @enderror"
                            placeholder="Duration of a test" value="{{$test->image}} ">
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel"
                        class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
                        
                    </button>
                    <!--end::Button-->
                </div>


            </div>
        </div>

    </form>
    
</div>
@stop
@section('script')
@stop