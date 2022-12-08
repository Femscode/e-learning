@extends('admin.adminmaster')
@section('header')
<h5>All Users</h5>
@stop
@section('subheader')
@if(Session::has('message'))
<div class='alert alert-success'>{{ Session::get('message') }}</div>
@endif
@stop
@section('content')
<h2>Assign Folder</h2>
<div class="nk-block nk-block-lg">

    <form method='post' action='{{route("assignfolderdocument")}}'>@csrf

        <!--begin::Input group-->
        {{-- <div class="fv-row row mb-15">
            <!--begin::Col-->
            <div class="col-md-3 d-flex align-items-center">
                <!--begin::Label-->
                <label class="fs-6 fw-bold">Assign to all users</label>
                <!--end::Label-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-9">
                <!--begin::Switch-->
                <div
                    class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" name="alluser"
                        type="checkbox" value="" id="autotimezone">
                    <label class="form-check-label" for="autotimezone">All Users</label>
                </div>
                <!--begin::Switch-->
            </div>
            <!--end::Col-->
        </div> --}}

        <div class="fv-row row mb-15">
            <!--begin::Col-->
            <div class="col-md-3 d-flex align-items-center">
                <!--begin::Label-->
                <label class="fs-6 fw-bold">Select Multiple Users</label>
                <!--end::Label-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-9">
                <!--begin::Input-->
                <select name='userId[]' multiple='multiple' aria-label="Select Users"
                    data-control="select2" data-placeholder="Select Users..."
                    class="form-select mb-2 select2-hidden-accessible"
                    data-select2-id="select2-data-10-t0j8" tabindex="-1"
                    aria-hidden="true">
                    <option data-select2-id="select2-data-12-qbd7"></option>
                    @foreach(App\User::all() as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row row mb-15">
            <!--begin::Col-->
            <div class="col-md-3">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mt-2">Documents</label>
                <div class="text-muted fs-7">Multiple documents to be assigned</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-9">
                <!--begin::Input-->
                <select name="folderId[]" multiple='multiple'
                    aria-label="Select multiple documents to assign to users"
                    data-hide-search="true" data-control="select2"
                    data-placeholder="Select multiple documents to assign to users"
                    class="form-select mb-2 select2-hidden-accessible"
                    data-select2-id="select2-data-13-118z" tabindex="-1"
                    aria-hidden="true">
                    <option data-select2-id="select2-data-15-tbnw"></option>
                    @foreach(App\Models\Folder::all() as $folder)
                    <option value="{{$folder->id}}">{{$folder->name}}</option>
                    @endforeach

                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <!--end::Input group-->
        <div class="row mt-12">
            <div class="col-md-9 offset-md-3">
                <!--begin::Cancel-->
                <button type="button" class="btn btn-light me-3">Cancel</button>
                <!--end::Cancel-->
                <!--begin::Button-->
                <button type="submit" class="btn btn-primary"
                    id="kt_file_manager_settings_submit">
                    <span class="indicator-label">Assign</span>
                    
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--begin::Action buttons-->
    </form>
    
</div>
@stop
@section('script')
@stop