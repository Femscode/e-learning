@extends('admin.adminmaster')
@section('header')
<h5>All Users</h5>
@stop
@section('content')
<div class="nk-fmg-body-content">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between position-relative">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">User Folder</h3>
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools g-1">
                    <li class="d-lg-none">
                        <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                    </li>
                    <li class="d-lg-none">
                        <div class="dropdown">
                            <a href="#" class="btn btn-trigger btn-icon" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#file-upload" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-file-plus"></em><span>Create File</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="d-lg-none mr-n1"><a href="#" class="btn btn-trigger btn-icon toggle" data-target="files-aside"><em class="icon ni ni-menu-alt-r"></em></a></li>
                </ul>
            </div>
            <div class="search-wrap px-2 d-lg-none" data-search="search">
                <div class="search-content">
                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message">
                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                </div>
            </div><!-- .search-wrap -->
        </div>
    </div>
    <div class="nk-fmg-quick-list nk-block">
        <div class="nk-block-head-xs">
            <div class="nk-block-between g-2">
                <div class="nk-block-head-content">
                    <li>
                        <div class="dropdown">
                            <a href="#" class="btn btn-light" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-plus"></em> <span>Create</span></a>
                            <div class="dropdown-menu dropdown-menu-right" style="">
                               
                            </div>
                        </div>
                    </li>
                </div>

                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Create Questions
                </button> --}}
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create Folder</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form" id='createfolder' >@csrf
                                    <!--begin::Modal header-->
                
                                    <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Scroll-->
                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                            <!--begin::Notice-->
                
                                            
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Folder Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control" placeholder="" id='name' name="name" />
                                                <!--end::Input-->
                                            </div>
                                           
                                        <!--end::Scroll-->
                                    </div>
                                    <!--end::Modal body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create Folder</button>
                                    </div>
                                </form>
                
                            </div>
                
                        </div>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="#" class="link link-primary toggle-opt active" data-target="quick-access">
                        {{-- <div class="inactive-text">Show</div>
                        <div class="active-text">Hide</div> --}}
                    </a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="toggle-expand-content expanded" data-content="quick-access">
            <div class="nk-files nk-files-view-grid">
                <div class="nk-files-list">
                    @foreach(App\User::all() as  $key => $user)

                    <div class="nk-file-item nk-file">
                        <div class="nk-file-info">
                            <a href="/listuserdocument/{{$user->id}}" class="nk-file-link">
                                <div class="nk-file-title">
                                    <div class="nk-file-icon">
                                        <span class="nk-file-icon-type">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                <g>
                                                    <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5" style="fill:#f29611"></rect>
                                                    <path d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z" style="fill:#ffb32c"></path>
                                                    <path d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z" style="fill:#f2a222"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="nk-file-name">
                                        <div class="nk-file-name-text">
                                            <span href="/listuserdocument/{{$user->id}}" class="title">{{ $user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div><!-- .nk-files -->
        </div>
    </div>
  
</div>
@stop
@section('script')
<script>
    $(document).ready(function() {
        // $("#create_folder").click(function() {
        // 	swal('success',"Folder Created Successfully",'success');
        // })
        // alert('good')
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $('body').on("submit","#createfolder", async function(e) {
                   e.preventDefault()
                 
                         $("#create_folder").attr('disabled',true);
                        var fd = new FormData();

                        // Append data 
                        fd.append('name', $("#name").val());
                        

                        console.log(fd, 'this is the fd');

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('createfolder') }}",
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                swal("Success", 'Folder created successfully', 'success');
                         $("#create_folder").attr('disabled',false);
                                console.log(data)
                                window.location.reload();

                            },
                            error: function(data) {
                                console.log(data);
                                swal('Oops', 'Folder not created','error')
                            }
                        });
                    });

                 



        $('body').on('click', '#delete_folder', function () {
                // var id = $("#delete_id").val();
                id = $(this).data('id');
                name = $(this).data('name');
                console.log(id)
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;
                // alert(user_id);
                resetAccount(el,id,name);
                });
    
    
            async function resetAccount(el,id,name) {
                    const willUpdate = await swal({
                        title: "Confirm Folder Delete",
                        text: `Are you sure you want to delete the folder `+name+`?`,
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
                        swal("Folder " +name+" will not be deleted  :)");
                    }
                }
    
    
            function performDelete(el,id)
                {
                   
                    try {
                            $.get('{{ route('deletefolder') }}?id=' + id,
                            function (data, status) {
                                console.log(status);
                                console.table(data);
                                if( status === "success") {
                                    let alert = swal('success',"Folder successfully deleted!.",'success');
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
    
    </script>

@stop