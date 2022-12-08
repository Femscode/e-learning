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
        <div class="card" style='min-width:500px'>
            <!--begin::Card body-->
            <div class="card-body pb-0">

{{-- //coming here --}}
{{-- <input type="text" id='myInput' data-kt-filemanager-table-filter="search" class="form-control form-control-solid w-1050px ps-15 " placeholder="Search for users ..."> --}}

<a href="#" class="btn btn-primary er fs-6 px-8 py-4 float-right" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Assign Test</a>
           
<div class="card-body py-3" id='table_data' >
   @include('dashboard.assignpagination')
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
                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                                        </svg>
                                    </span>
                                    
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-bold">
                                            <h4 class="text-gray-900 fw-bolder">Info</h4>
                                            <div class="fs-6 text-gray-700">Assign Test To Users</div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
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
                                <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Address-->
    </div>
    <!--end::Container-->
{{-- </div> --}}
@section('script')

<script src='https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js'></script>
<script>
var oTable = $('#assigntable').DataTable();   //using Capital D, which is mandatory to retrieve "api" datatables' object, latest jquery Datatable
$('#myInput').keyup(function(){
      oTable.search($(this).val()).draw() ;
});


</script>
<script>
    $(document).ready(function(){

$(document).on('click', '.page-link', function(event){
event.preventDefault(); 
var page = $(this).attr('href').split('page=')[1];
fetch_data(page);
});

function fetch_data(page)
{
var _token = $("input[name=_token]").val();
$.ajax({
url:"{{ route('assignpagination') }}",
method:"POST",
data:{_token:_token, page:page},
success:function(data)
{
$('#table_data').html(data);
}
});
}

});
</script>
<script>
$(document).ready(function() {
    $('body').on('click', '#delete_assign', function () {
            // var id = $("#delete_id").val();
			testId = $(this).data('id');
			userId = $(this).data('user');
            username = $(this).data('username');
            test = $(this).data('test');
            console.log(testId,userId,username,test);
            // userid = $('#userId').val();
            console.log(testId)
            var token = $("meta[name='csrf-token']").attr("content");
            var el = this;
            // alert(user_id);
            resetAccount(el,testId, userId,test,username);
            });


        async function resetAccount(el,testId, userId,username,test) {
                const willUpdate = await swal({
                    title: "Confirm Assign Delete",
                    text: `Are you sure you want to detach "`+test+` " from `+username+`?`,
                    icon: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    buttons: ["Cancel", "Yes, Detach"]
                });
                if (willUpdate) {
                    //performReset()
                    performDelete(el,testId,userId);
                } else {
                    swal(test+ " will not be detached from "+ username +":)");
                }
            }


        function performDelete(el,testId, userId)
            {
               
                try {
                        $.get('{{ route('test.remove') }}?testId=' + testId + '?userId=' + userId,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"Test successfully detached!.",'success');
                                $(el).closest( "tr" ).remove();
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

</script>
@stop

@stop