@extends('layouts.app')

@section('scripts')

@endsection

@section('links')
    <style>
        .bg3 .card-body p {
            text-transform: uppercase;
            font-size: 18px;
            font-weight: 600;
        }
        .bg3 .card-body a {
            color: inherit;
            text-decoration: auto;
        }
        .o9p {
            text-align: center;
            justify-content: center;
        }
        .lgbg{
            background: #1d2279;
        }
        .lgbg img{
            width: 60%;
            margin: auto;
        }
        .usrbtn{
            width: 200px;
            margin-left: auto;
            margin-bottom: 30px;
        }

    </style>
@endsection

@section('content')
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="row">
        <div class="col d-flex justify-content-end">
            {{-- <button data-toggle="modal" data-target="#add-application-modal" class="shadow btn btn-rounded btn-outline-indigo btn-with-icon"><i class="typcn typcn-document-add"></i> Add Application</button> --}}
        </div>
    </div>

    <div class="az-content-breadcrumb">
        <span>Home</span>
        <span>Applications</span>
    </div>

    
    
    <h2 class="az-content-title mb-3">User Accounts</h2>
    @if (auth()->user()->roleID == 1)
    <button class="btn btn-primary identifyingClass usrbtn" data-bs-toggle="modal" data-bs-target="#add-application-modal">Add user</button>
    @endif


    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-applications-tab" data-toggle="tab" href="#all-applications" role="tab" aria-controls="all-applications" aria-selected="true" style="background: #000000;">All Users</a>
        </li>

       
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all-applications" role="tabpanel" aria-labelledby="All applications">
            <h5 class="mg-10 ml-0">&nbsp;</h5>

            <div class="table-responsive">
                <div id="all-applications-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <table class="table table-hover mg-b-0 dataTable no-footer" id="all-applications-table" style="width: 100%;" aria-describedby="all-applications-table_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 150px;" aria-label="ID: activate to sort column ascending">userID</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 150px;" aria-label="Date / Time: activate to sort column ascending">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 181px;" aria-label="Name: activate to sort column ascending">Acc. Name</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Name: activate to sort column ascending">Username</th>
                                <th class="sorting" tabindex="0" aria-controls="all-applications-table" rowspan="1" colspan="1" style="width: 98px;" aria-label="Gender: activate to sort column ascending">RoleID</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $data)
                            <tr class="odd">
                                <td>
                                    {{-- <a href="#" data-toggle="modal" data-target="#add-application-modal">{{$data->projectId}}</a> --}}
                                    <a href="" class="identifyingClass" >{{$data->userID}}</a>
                                </td>
                                <td>{{\Carbon\Carbon::parse($data->created_at)->toFormattedDateString()}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->roleID == 1 ? 'Admin' : 'User'}}</td>
                                @if (auth()->user()->roleID == 1)
                                <td>
                                    <a onclick="return confirm('Are you sure ?')" href="{{route('portal.users.delete', [$data->userID])}}">delete data</a>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr class="odd">
                                <td valign="top" colspan="6" class="dataTables_empty">No data available in table</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            {{-- {{$readings->links()}} --}}
        </div>

    </div>
</div>

<div id="add-application-modal" class="modal pjk" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">New User</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>New User</h6>
                <form id="kepapp" action="{{route('portal.users.add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-3">
                        <!-- Name Field -->
                        <div class="col-md">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" required class="form-control" id="name" name="name" />
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <!-- Date of Birth Field -->
                        <div class="col-md-12">
                            <label for="dob" class="form-label">Username</label>
                            <input type="text" required class="form-control" name="username" />
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <!-- Date of Birth Field -->
                        <div class="col-md-12">
                            <label for="dob" class="form-label">Role</label>
                            <select name="roleID" required class="form-control">
                                <option value="">-choose-</option>
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <!-- Date of Birth Field -->
                        <div class="col-md-12">
                            <label for="dob" class="form-label">Password</label>
                            <input type="text" required class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    
                    </div>
                
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- modal-dialog -->
</div>



@endsection