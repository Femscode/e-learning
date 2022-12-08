@extends('layout.adminmaster')
@section('content')	
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

                                
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    {{-- <div id="kt_content_container" class="container-xxl"> --}}
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            
<div class='col-md-12'>
        
            <div class="card-body pt-9 pb-0" style='width:1200px'>
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form action="{{route('test.update',[$test->id])}}" method="POST" enctype='multipart/form-data'>@csrf
                            {{method_field('PUT')}}
                               
                       <div class="module">
                               <div class="module-head">
                                   <h3>Update test</h3>
                               </div>
                   
                               <div class="module-body">
                                    <div class="control-group">
                                   <label class="control-lable" for="name">test name</label>
                                   <div class="controls"> 
                                       <input required type="text" name="name" class="form-control @error('name') border-red @enderror" placeholder="name of a test" value="{{$test->name}}  " >
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
                                       <textarea required name="description" class="form-control @error('description') is-invalid @enderror"> {{$test->description}}   </textarea>
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
                                       <input required type="text" name="minutes" class="form-control @error('minutes') is-invalid @enderror" placeholder="Duration of a test" value="{{$test->minutes}} " >
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
                                       <input accept='image/*' type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Duration of a test" value="{{$test->image}} " >
                                   </div>
                                  @error('image')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                   
                               <div class="control-group">
                                   <div class="controls">
                                       <button type="submit" class="btn btn-success">Update</button>
                                   </div>
                   
                               </div>
                   
                   
                              </div>
                       </div>
                   
                   </form>   <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            </div>
</div>
        </div>
</div>





                <!--begin::Heading-->
                <div class="card-px text-center pt-20 pb-5">
                    <!--begin::Title-->
                    <!--end::Description-->
                    <!--begin::Action-->
                    <!--end::Action-->
                </div>
                <!--end::Heading-->
                <!--begin::Illustration-->
                <div class="text-center px-5">
                    <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/19-dark.png" alt="" class="mw-100 h-200px h-sm-325px" />
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modal - New Address-->
        <div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                   
                </div>
            </div>
        </div>
        <!--end::Modal - New Address-->
    </div>
    <!--end::Container-->
{{-- </div> --}}

@stop