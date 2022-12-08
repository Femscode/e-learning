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
<h2>All Test</h2>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Create Test
</button><br><br>
<div class='col-sm-4'>
    <input type="text" id='Searchtab1' class="form-control focus" id="default-1-01" placeholder="Search..."><br>
</div>
<div class="nk-block">
    <div class="row g-gs" id='table_data'>

        @include('layout.testpagination')
    </div>
    
</div>





{{-- <div class="nk-block nk-block-lg">

    <div class="card card-preview">

        <div class="card-inner">
            <div id="kanban" class="nk-kanban">
                <div class="kanban-container" style="width: 1280px;">
                    @foreach($tests as $key => $test)
                    <div data-id="_in_progress" data-order="2" class="kanban-board"
                        style="width: 320px; margin-left: 0px; margin-right: 0px;">
                        <header class="kanban-board-header kanban-primary">
                            <div class="kanban-title-board">
                                <div class="kanban-title-content">
                                    <h6 class="title">Number of Questions</h6>
                                    <span class="badge badge-pill badge-outline-light text-dark">
                                        {{count($test->questions)}}</span>
                                </div>
                                <div class="kanban-title-content">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mr-n1"
                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{route('test.edit',[$test->id])}}"><em
                                                            class="icon ni ni-edit"></em><span>Edit Test
                                                        </span></a></li>
                                                <li><a id='delete_test' data-name='{{ $test->name }}'
                                                        data-key='{{ ++$key }}' data-id='{{ $test->id }}'><em
                                                            class="icon ni ni-trash"></em><span>Delete Test
                                                        </span></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <main class="kanban-drag">
                            <div class="kanban-item">
                                <div class="kanban-item-title">
                                    <h6 class="title">{{ $test->name }}</h6>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-avatar-group">
                                                <div class="user-avatar xs bg-danger"><span>T</span></div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr p-3 g-2">
                                                <li>
                                                    <div class="user-card">
                                                        <div class="user-avatar sm bg-danger">
                                                            <span>AT</span>
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">{{ $test->name}} </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanban-item-text">
                                    <p>{{ $test->description }}.</p>
                                </div>

                                <div class="kanban-item-meta">
                                    <ul class="kanban-item-meta-list">
                                        <li><em class="icon ni ni-calendar"></em><span>{{ $test->created_at}}</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </main>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div><!-- .card-preview -->
</div> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('test.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->
                            <!--begin::Notice-->

                            <!--end::Notice-->
                            <!--end::Notice-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required class="form-control" placeholder="" name="name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input minlength="8" required class="form-control" placeholder="" name="description" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2">Time(In Minutes)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required type='number' class="form-control" placeholder="" name="minutes" />
                                <!--end::Input-->
                            </div>

                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Display Image(Optional)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type='file' accept='image/*' class="form-control" placeholder="" name="image" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>

                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('updatewithroute')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->
                            <!--begin::Notice-->

                            <!--end::Notice-->
                            <!--end::Notice-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required class="form-control" id='name' placeholder="" name="name" />
                                <!--end::Input-->
                            </div>
                            <input type='hidden' id='test_id' name='id'>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input minlength="8" required class="form-control" id='description' placeholder="" name="description" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2">Time(In Minutes)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required type='number' class="form-control" id='minute' placeholder="" name="minutes" />
                                <!--end::Input-->
                            </div>

                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Display Image(Optional)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type='file' accept='image/*' class="form-control" placeholder="" name="image" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>

                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_new_address5" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <form class="form" action="{{route('test.assign')}}" method="POST">@csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2>Assign Test</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Notice-->
                       
                        <!--end::Notice-->
                        <!--end::Notice-->
                        <!--begin::Input group-->
                        
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Test</label>
                            <!--end::Label-->
                        </select>
                        <select name="test_id[]" multiple="" aria-label="Select Test" data-control="select2" data-placeholder="Select Test..." class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-10-t0j8" tabindex="-1" aria-hidden="true">
                            {{-- <select name='test_id' multiple required class="form-control form-control-solid" placeholder=""  > --}}
                                
                                @foreach($tests as $test)
                                <option value='{{$test->id}}'>{{$test->name}}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">User</label>
                            <!--end::Label-->
                            <select name="user_id[]" multiple="" aria-label="Select User" data-control="select2" data-placeholder="Select User..." class="form-select mb-2 select2-hidden-accessible" data-select2-id="select2-data-10-t0j9" tabindex="-1" aria-hidden="true">
                            {{-- <select name='user_id' multiple required class="form-control form-control-solid" placeholder="" > --}}
                                <option value=''>Select User</option>
                                @foreach($users as $user)
                                <option value='{{$user->id}}'>{{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                      
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>


        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function() {

    $('body').on('click', '#delete_test', function () {
            // var id = $("#delete_id").val();
			id = $(this).data('id');
            name= $(this).data('name');
            key = $(this).data('key');
            console.log(id)
            var token = $("meta[name='csrf-token']").attr("content");
            var el = this;
            // alert(user_id);
            resetAccount(el,id,key, name);
            });
        async function resetAccount(el,id,key,name) {
                const willUpdate = await swal({
                    title: "Confirm Test Delete",
                    text: `Are you sure you want to delete test number `+key+` ?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Delete"]
                });
                if (willUpdate) {
                    //performReset()
                    performDelete(el,id);
                } else {
                    swal("Test number " +key + " will not be deleted  :)");
                }
            }


        function performDelete(el,id)
            {
               
                try {
                        $.get('{{ route('test.destroy') }}?id=' + id,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"Test successfully deleted!.",'success');
                                $(el).closest( "tr" ).remove();
                                window.location.reload()
                                // alert.then(() => {
                                // });
                            }
                        }
                    );
                } catch (e) {
                    let alert = swal(e.message);
                }
            }
	
})
// $("#Searchtab1").on("keyup input", function () {
// if (this.value.length > 0) {
//   $(".alluls").each(function(){
//       $(this).hide().filter(function () {
//         $(this).closest('.a');
//         return $(this).toLowerCase().indexOf($("#Searchtab1").val().toLowerCase(),0)==  0;

//       }).show();
//   });

// }
// else {
//   $(".alluls").show();
// }
// });
</script>
<script>
    $("body").on('click','#edit_test',function() {
var id = $(this).data('id')

$.get('{{ route('edittestwithroute') }}?id='+id, function(data) {
console.log(data)
$("#name").val(data.name)
$("#description").val(data.description)
$("#minute").val(data.minutes)
$("#test_id").val(id)
});
    })
    $("#Searchtab1").on("keyup input", function () {
if (this.value.length > 0) {
    var search = $("#Searchtab1").val();
    console.log(search,'the search')
    $.get('{{ route('searchtest') }}?search=' + search, function (data) {
			console.log(data,'the locations')
            $("#table_data").empty()
            $.each(data, function( index, value ) {
               
                var date = value.created_at
                var counted = value.questions.length
               
                $('#table_data').append('<div class="alluls col-sm-6 col-xl-4" id="testappend"><div class="card card-bordered h-100"><div class="card-inner"><div class="project"><div class="project-head"><a href="html/apps-kanban.html" class="project-title"><div class="user-avatar sq bg-purple"><span>'+counted+'</span></div><div class="project-info"><h6 class="title">'+value.name+'</h6></div></a><div class="drodown"><a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr"><li><a data-toggle="modal" id="edit_test" data-id='+value.id+' data-target="#exampleModalCenter2"><em class="icon ni ni-edit"></em><span>Edit Test</span></a></li><li><a id="delete_test" data-name='+value.name+' data-key='+index+' data-id='+value.id+'><em class="icon ni ni-trash"></em><span>Delete Edit</span></a></li></ul></div></div></div><div class="project-details"><p>'+value.description+'</p></div><div class="project-progress"><div class="project-progress-details"><div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>'+counted+'Questions</span></div><div class="project-progress-percent">'+counted+'%</div></div><div class="progress progress-pill progress-md bg-light"><div class="progress-bar" data-progress="'+counted+'"style="width:'+counted+'%;"></div></div></div><div class="project-meta"><ul class="project-users g-1"><li><div class="user-avatar sm bg-primary"><span>A</span></div></li><li><div class="user-avatar sm bg-blue"><img src="./images/avatar/b-sm.jpg" alt=""></div></li><li><div class="user-avatar bg-light sm"><span>+12</span></div></li></ul><span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>'+moment(date).format("MM/DD/YYYY")+'</span></span></div></div></div></div></div> ')
});
});

}
else {
  $(".alluls").show();
}
});
</script>
<script>
    $(document).ready(function(){
     
     $(document).on('click', '.pagination a', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });
     
     function fetch_data(page)
     {
      $.ajax({
       url:"get_ajax_data?page="+page,
       success:function(data)
       {
        $('#table_data').html(data);
       }
      });
     }
     
    });
</script>
@stop