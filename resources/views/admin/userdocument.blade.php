@extends('admin.adminmaster')
@section('header')

@stop
@section('subheader')
<h2>Files Uploaded by {{ $user->name }}</h2>
@endsection
@section('content')

<div class="tab-content">
    
   
    <div class="tab-pane active" id="file-list-view">
        <div class="nk-files nk-files-view-list">
           
            <div class="nk-files-list">
                @foreach($files as $file)
                <div class="nk-file-item nk-file">
                    <div class="nk-file-info">
                        <div class="nk-file-title">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                            <div class="nk-file-icon">
                                <span class="nk-file-icon-type">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                        <g>
                                            <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                            <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                            <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                            <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                            <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                            <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                            <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="nk-file-name">
                                <div class="nk-file-name-text">
                                    <a href="#" class="title">{{ $file->name }}</a>
                                    <div class="nk-file-star asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-file-meta">
                        <div class="tb-lead">{{date("d-m-Y", strtotime($file->created_at))}}</div>
                    </div>
                    <div class="nk-file-members">
                        <div class="tb-lead">Only Me</div>
                        <div class="tb-shared"><em class="ni ni-link" data-toggle="tooltip" data-placement="left" title="" data-original-title="People with the link can view"></em></div>
                    </div>
                    <div class="nk-file-actions">
                        <div class="dropdown">
                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-plain no-bdr">
                                    <li><a href="/downloaduploadeddocument/{{ $file->id }}" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                    <li><a><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                    {{-- <li><a id='delete_file' data-id='{{ $file->id }}' data-name='{{ $file->name }}'><em class="icon ni ni-trash"></em><span>Delete</span></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!-- .nk-files -->
    </div><!-- .tab-pane -->
</div>
@stop
@section('script')
<script>
    $(document).ready(function() {
        $('body').on('click', '#delete_file', function () {
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
                        title: "Confirm File Delete",
                        text: `Are you sure you want to delete the file `+ name + `?`,
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
                        swal("File "+ name + " will not be deleted  :)");
                    }
                }
    
    
            function performDelete(el,id)
                {
                   
                    try {
                            $.get('{{ route('deletefile') }}?id=' + id,
                            function (data, status) {
                                console.log(status);
                                console.table(data);
                                if( status === "success") {
                                    let alert = swal('success',"File successfully deleted!.",'success');
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