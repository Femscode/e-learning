@extends('admin.adminmaster')
@section('header')
<h5>All Users</h5>
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
<h2>Edit Question</h2>
<div class="nk-block nk-block-lg">

<form action="{{route('question.update',[$question->id])}}" method="POST">@csrf
        {{method_field('PUT')}}

        <div class="module">




            <input type='hidden' name='quiz' value='{{$test_id}}'>
            <div class="control-group">
                <label class="form-label" for="name">Question name</label>
                <div class="controls">
                    <input type="text" name="question" class="form-control @error('name') border-red @enderror"
                        placeholder="name of a quiz" value="{{$question->question}}">
                </div>
                @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="control-group">
                <h4><strong>Options</strong></h4><br>
                <div class="controls">
                    @foreach($question->answers as $key=>$answer)
                    <input type="radio" name="correct_answer" value="{{$key}}"
                        @if($answer->is_correct){{'checked'}}@endif>
                    <span>Is correct answer</span>
                    <input type="text" name="options[]" class="form-control " value="{{$answer->answer}}" required="">


                    @endforeach
                </div>
                @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>







            <div class="modal-footer flex-center">
                <!--begin::Button-->
                <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
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