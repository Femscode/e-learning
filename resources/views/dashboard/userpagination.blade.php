<div class='row g-6 g-xl-9' id='userpage'>
@foreach ($users as $user)
<div class="col-md-6 col-xl-4" id=>
    <!--begin::Card-->
    <a href="/userdetails/{{ $user->id }}"
        class="card border-hover-primary">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-9">
            <!--begin::Card Title-->
            <div class="card-title m-0">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px w-50px bg-light">
                    @if($user->image == null)
                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/brand-logos/kanba.svg"
                        alt="image" class="p-3" />
                        @else
					<img src="{{ asset('profilePic/'.$user->image.'') }}"/>
                @endif
                </div>
                <!--end::Avatar-->
            </div>
            <!--end::Car Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
              
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end:: Card header-->
        <!--begin:: Card body-->
        <div class="card-body p-9">
            <!--begin::Name-->
            <div class="fs-3 fw-bolder text-dark">{{ $user->firstname }}</div>
            <!--end::Name-->
            <!--begin::Description-->
            <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{ $user->email }}
            </p>
            <!--end::Description-->
            <!--begin::Info-->
            <div class="d-flex flex-wrap mb-5">
                <!--begin::Due-->
                <div
                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bolder">
                        {{ date("d/m/Y", strtotime($user->created_at))}}</div>
                    <div class="fw-bold text-gray-400">Register Date</div>
                </div>
                <!--end::Due-->
                <!--begin::Budget-->
                <div
                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fs-6 text-gray-800 fw-bolder">
                        <button href="#"
                            class="kt_toolbar_primary_button_class btn btn-sm btn-primary"
                            data-id='{{ $user->id }}' data-bs-toggle="modal"
                            data-bs-target="#kt_modal_create_app">View</button>
                    </div>

                </div>
                <!--end::Budget-->
            </div>
            <!--end::Info-->
            <!--begin::Progress-->
            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                title="This project 100% completed">
                <div class="bg-success rounded h-4px" role="progressbar"
                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <!--end::Progress-->
            <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                <!--begin::User-->
                <div class="symbol symbol-35px symbol-circle"
                    data-bs-toggle="tooltip" title="Nick Macy">
                </div>
                <!--begin::User-->
                <!--begin::User-->
                <div class="symbol symbol-35px symbol-circle"
                    data-bs-toggle="tooltip" title="Sean Paul">
                </div>
                <!--begin::User-->
                <!--begin::User-->
                <div class="symbol symbol-35px symbol-circle"
                    data-bs-toggle="tooltip" title="Mike Collin">
                    <span data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app"
                        id="kt_toolbar_primary_button"></span>
                </div>

            </div>
            <!--end::Users-->
        </div>
        <!--end:: Card body-->
    </a>
    <!--end::Card-->
</div>
@endforeach
</div>
<div class='pagination m-5'>
{!! $users->links() !!}
</div>
