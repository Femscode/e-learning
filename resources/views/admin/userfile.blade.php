@extends('admin.adminmaster')
@section('header')

@stop
@section('subheader')
<h5>Documents attached to {{ $user->name }}</h5>
@stop
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
                                    {{-- <li><a href='/assignpage/{{$folder->id}}' ><em class="icon ni ni-eye"></em><span>Assign</span></a></li>
                                    <li><a href="/download/{{ $file->id }}" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li> --}}
                                    <li><a id='detach_file' data-user='{{$user->id}}'
                                        data-folderName='{{ $file->name }}'
                                        data-folder='{{ $file->id }} '><em class="icon ni ni-trash"></em><span>Detach File</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



                @foreach($folders as $file)
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
                                            <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5" style="fill:#f29611"></rect>
                                            <path d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z" style="fill:#ffb32c"></path>
                                            <path d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z" style="fill:#f2a222"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="nk-file-name">
                                <div class="nk-file-name-text">
                                    <a href="/adminfile/{{ $file->id }}" class="title">{{ $file->name }}</a>
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
                                    {{-- <li><a href='/assignpage/{{$folder->id}}' ><em class="icon ni ni-eye"></em><span>Assign</span></a></li>
                                    <li><a href="/download/{{ $file->id }}" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li> --}}
                                    <li><a id='detach_folder' data-user='{{$user->id}}'
                                        data-folderName='{{ $file->name }}'
                                        data-folder='{{ $file->id }} ' type="button"
                                        ><em class="icon ni ni-trash"></em><span>Detach File</span></a></li>
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
            $('body').on('click', '#detach_file', function () {
                    // var id = $("#delete_id").val();
                    userId = $(this).data('user');
                    folderId = $(this).data('folder');
                    folderName = $(this).data('foldername');
                    // console.log(id)
                    var token = $("meta[name='csrf-token']").attr("content");
                    var el = this;
                    // alert(user_id);
                    resetAccount(el,userId, folderId, folderName);
                    });
        
        
                async function resetAccount(el,userId,folderId,folderName ) {
                        const willUpdate = await swal({
                            title: "Confirm file Detach",
                            text: `Are you sure you want to detach the file ` +folderName+`?`,
                            icon: "warning",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes!",
                            showCancelButton: true,
                            buttons: ["Cancel", "Yes, Detach"]
                        });
                        if (willUpdate) {
                            //performReset()
                            performDelete(el,userId, folderId);
                        } else {
                            swal("File "+ folderName + " will not be detached  :)");
                        }
                    }
        
        
                function performDelete(el,userId, folderId)
                    {
                       
                        try {
                                $.get('/detachfile/' + userId+ '/'+ folderId,
                                function (data, status) {
                                    console.log(status);
                                    console.table(data);
                                    if( status === "success") {
                                        let alert = swal('success',"File successfully detached!.",'success');
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
<script>
    $(document).ready(function() {
            $('body').on('click', '#detach_folder', function () {
                    // var id = $("#delete_id").val();
                    userId = $(this).data('user');
                    folderId = $(this).data('folder');
                    folderName = $(this).data('foldername');
                    // console.log(id)
                    var token = $("meta[name='csrf-token']").attr("content");
                    var el = this;
                    // alert(user_id);
                    resetAccount(el,userId, folderId, folderName);
                    });
        
        
                async function resetAccount(el,userId,folderId,folderName ) {
                        const willUpdate = await swal({
                            title: "Confirm Folder Detach",
                            text: `Are you sure you want to detach the folder ` +folderName+`?`,
                            icon: "warning",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes!",
                            showCancelButton: true,
                            buttons: ["Cancel", "Yes, Detach"]
                        });
                        if (willUpdate) {
                            //performReset()
                            performDelete(el,userId, folderId);
                        } else {
                            swal("Folder "+ folderName + " will not be detached  :)");
                        }
                    }
        
        
                function performDelete(el,userId, folderId)
                    {
                       
                        try {
                                $.get('/detachfolder/' + userId+ '/'+ folderId,
                                function (data, status) {
                                    console.log(status);
                                    console.table(data);
                                    if( status === "success") {
                                        let alert = swal('success',"Folder successfully detached!.",'success');
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