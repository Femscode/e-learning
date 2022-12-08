@foreach($tests as $key => $test)

<div class="alluls col-sm-6 col-xl-4" id='testappend'>
    <div class="card card-bordered h-100">
        <div class="card-inner">
            <div class="project">
                <div class="project-head">
                    <a href="html/apps-kanban.html" class="project-title">
                        <div class="user-avatar sq bg-purple"><span>{{count($test->questions)}}</span></div>
                        <div class="project-info">
                            <h6 class="title">{{ $test->name }}</h6>
                            {{-- <span class="sub-text">Softnio</span> --}}
                        </div>
                    </a>
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                {{-- <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View
                                            Project</span></a></li> --}}
                                {{-- <li><a href="{{route('test.edit',[$test->id])}}"><em
                                            class="icon ni ni-edit"></em><span>Edit Test</span></a></li> --}}
                                <li><a data-toggle="modal" id='edit_test' data-id='{{ $test->id }}' data-target="#exampleModalCenter2"><em
                                            class="icon ni ni-edit"></em><span>Edit Test</span></a></li>
                                <li><a data-bs-toggle="modal" data-bs-target="#kt_modal_new_address5"><em
                                    class="icon ni ni-users"></em><span>Assign Test</span></a></li>
                                <li><a id='delete_test' data-name='{{ $test->name }}' data-key='{{ ++$key }}'
                                        data-id='{{ $test->id }}'><em class="icon ni ni-trash"></em><span>Delete
                                            Edit</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="project-details">
                    <p>{{ $test->description }}</p>
                </div>
                <div class="project-progress">
                    <div class="project-progress-details">
                        <div class="project-progress-task"><em
                                class="icon ni ni-check-round-cut"></em><span>{{count($test->questions)}}
                                Questions</span></div>
                        <div class="project-progress-percent">{{count($test->questions)}}%</div>
                    </div>
                    <div class="progress progress-pill progress-md bg-light">
                        <div class="progress-bar" data-progress="{{count($test->questions)}}"
                            style="width: {{count($test->questions)}}%;"></div>
                    </div>
                </div>
                <div class="project-meta">
                    <ul class="project-users g-1">
                        <li>
                            <div class="user-avatar sm bg-primary"><span>A</span></div>
                        </li>
                        <li>
                            <div class="user-avatar sm bg-blue"><img src="./images/avatar/b-sm.jpg" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="user-avatar bg-light sm"><span>+12</span></div>
                        </li>
                    </ul>
                    <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>{{
                            date('d-m-Y', strtotime($test->created_at)) }}</span></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<br>
<div class='row-clearfix'>
    <div class='col-lg-12'>
<div class='pagination'>{!! $tests->links() !!}</div>
    </div>
</div>