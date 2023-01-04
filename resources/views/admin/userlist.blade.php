@extends('admin.adminmaster')
@section('header')
<h5>All Users</h5>
@stop
@section('content')
<h2>All Users</h2>
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
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <span>{{ substr($user->first_name,0,1) }}.{{ substr($user->last_name,0,1)}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{ $user->name }} <span
                                            class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{ $user->email }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>@if($user->phone !== null)<p>{{ $user->phone}}</p>@else<p style='color:red'>Not yet provided</p>@endif</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-status text-success">Active</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                             
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                             
                                                <li><a href="/adminviewuser/{{ $user->id }}"><em class="icon ni ni-eye"></em><span>View
                                                            Details</span></a></li>
                                                 <li><a id='delete_test' data-name='{{ $user->name }}' data-key='{{ ++$key }}'
                                                    data-id='{{ $user->id }}'><em class="icon ni ni-trash"></em><span>Delete User</span></a></li>
                                               
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
                    title: "Confirm User Delete",
                    text: `Are you sure you want to delete  `+name+` ?`,
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
                    swal("User will not be deleted  :)");
                }
            }


        function performDelete(el,id)
            {
               
                try {
                        $.get('{{ route('user.fakedestroy') }}?id=' + id,
                        function (data, status) {
                            console.log(status);
                            console.table(data);
                            if( status === "success") {
                                let alert = swal('success',"User successfully deleted!.",'success');
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

@stop