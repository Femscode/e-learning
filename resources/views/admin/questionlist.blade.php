@extends('admin.adminmaster')
@section('header')
<h5>All Questions</h5>
@stop
@section('subheader')
@if(Session::has('message')) 
<div class='alert alert-success'>{{ Session::get('message') }}</div>
@endif
@stop
@section('content')
<h2>All Questions</h2>
<button type="button" class="btn btn-primary" style='margin-right:0px' data-toggle="modal" data-target="#exampleModalCenter">
    Create Question
</button>

<div class="nk-block nk-block-lg">

    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Question</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Test</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Date Created</span></th>

                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $key => $test)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                
                                <div class="user-info">
                                    <span class="tb-lead">{{ $test->question }} <span
                                            class="dot dot-success d-md-none ml-1"></span></span>
                                    <span></span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{ $test->testlink->name }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{date('d-m-Y',strtotime($test->created_at))}}</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">

                                                <li><a href="{{route('question.show',[$test->id])}}"><em
                                                            class="icon ni ni-eye"></em><span>View
                                                        </span></a></li>
                                                {{-- <li><a href="{{route('question.edit',[$test->id])}}"><em
                                                            class="icon ni ni-pen"></em><span>Edit
                                                        </span></a></li> --}}
                                                <li><a data-toggle="modal"  id='edit_test' data-id='{{ $test->id }}' data-target="#exampleModalCenter2"><em
                                                            class="icon ni ni-pen"></em><span>Edit
                                                        </span></a></li>
                                                <li><a id='delete_question' data-key='{{ $key }}'
                                                        data-name='{{ $test->question }}' data-id='{{ $test->id }}'><em
                                                            class="icon ni ni-trash"></em><span>Delete
                                                        </span></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div><!-- .card-preview -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('question.store')}}" method="POST">@csrf
                    <!--begin::Modal header-->

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->

                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select required class="form-control" placeholder="" name="test">
                                    <option value=''>Select Test</option>
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
                                <label class="required fs-5 fw-bold mb-2">Question Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" placeholder="" name="question" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2">Options</label>
                                <!--end::Label-->
                                <!--begin::Input-->

                                @for($i=0;$i<4;$i++) <input required type="radio" name="correct_answer" value="{{$i}}">
                                    <span>Is correct answer</span>
                                    <input type="text" name="options[]" class="form-control"
                                        placeholder=" options{{$i+1}}" required="">

                                    @endfor
                                    <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create question</button>
                    </div>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('question.store')}}" method="POST">@csrf
                    <!--begin::Modal header-->

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->

                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Test Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                              
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Question Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" placeholder="" id='question' name="question" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2">Options</label>
                                <!--end::Label-->
                                <!--begin::Input-->

                                @for($i=0;$i<4;$i++) <input required type="radio" id='correct_answer' name="correct_answer" value="{{$i}}">
                                    <span>Is correct answer</span>
                                    <input type="text" name="options[]" id='options' class="form-control"
                                        placeholder=" options{{$i+1}}" required="">

                                    @endfor
                                    <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create question</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

@stop
@section('script')
<script>
   
    $("body").on('click','#edit_test',function() {
        var  id = $(this).data('id');
        alert(id)
        $.get('{{ route("editquestionwithroute") }}?id='+ id, function(data) {
            console.log(data,'the data')
            console.log(data.answers,'the answeer')
        })
    })
</script>
<script>
    $(document).ready(function() {

        $('body').on('click', '#delete_question', function () {
                // var id = $("#delete_id").val();
                id = $(this).data('id');
                name = $(this).data('name');
                key = $(this).data('key');
                console.log(id)
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;
                // alert(user_id);
                resetAccount(el,id, key,name);
                });
    
    
            async function resetAccount(el,id, key, name) {
                    const willUpdate = await swal({
                        title: "Confirm Question Delete",
                        text: `Are you sure you want to delete the question number `+key+` ?`,
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
                        swal("Question "+ key + " will not be deleted  :)");
                    }
                }
    
    
            function performDelete(el,id)
                {
                   
                    try {
                            $.get('{{ route('question.destroy') }}?id=' + id,
                            function (data, status) {
                                console.log(status);
                                console.table(data);
                                if( status === "success") {
                                    let alert = swal('success',"Question successfully deleted!.",'success');
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