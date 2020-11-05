@extends('master')
@section('title', 'Admin Profile')
@section('container')
    <div class="content-area p-b-1">
        <div class="profile-header m-b-1">
            <div class="profile-header-cover img-cover" style="background-image: {{asset('img/photos-1/1.jpg')}};"></div>
            <div class="profile-header-counters clearfix">
                <div class="container-fluid">
                    <div class="pull-xs-right">
                        <a href="#" class="text-black">
                            <h5 class="font-weight-bold">2k</h5>
                            <span class="text-muted">Followers</span>
                        </a>
                    </div>
                    <div class="pull-xs-right">
                        <a href="#" class="text-black">
                            <h5 class="font-weight-bold">320</h5>
                            <span class="text-muted">Following</span>
                        </a>
                    </div>
                    <div class="pull-xs-right">
                        <a href="#" class="text-black">
                            <h5 class="font-weight-bold">190</h5>
                            <span class="text-muted">Activities</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="card profile-card">
                        <div class="profile-avatar">
                            <img src="{{asset('img/avatars/1.jpg')}}" alt="">
                        </div>
                        <div class="card-block">
                            <h4 class="m-b-0-25">{{Auth::guard()->user()->name}}</h4>
                            <div class="text-muted m-b-1">Software Engineer</div>
                            <button type="button" class="btn btn-primary btn-rounded waves-effect">Follow</button>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary btn-rounded waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Connect
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Dropdown link 1</a>
                                    <a class="dropdown-item" href="#">Dropdown link 2</a>
                                    <a class="dropdown-item" href="#">Dropdown link 3</a>
                                    <a class="dropdown-item active" href="#">Dropdown link active</a>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group">
                            <a class="list-group-item" href="#">
                                <i class="ti-world m-r-0-5"></i> example.com
                            </a>
                            <a class="list-group-item" href="#">
                                <i class="ti-facebook m-r-0-5"></i> facebook.com/example
                            </a>
                            <a class="list-group-item" href="#">
                                <i class="ti-twitter m-r-0-5"></i> twitter.com/example
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">

                    <div class="card m-b-0">
                        <ul class="nav nav-tabs nav-tabs-2 profile-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Update Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password" role="tab">Forget Password</a>
                            </li>
                        </ul>
                        @include('partials._message')
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <form class="form-horizontal" action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="media stream-item">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{Auth::guard()->user()->name}}" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email<span style="color: red;">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{Auth::guard()->user()->email}}" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="role" name="role" value="{{Auth::guard()->user()->role}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Photo<span style="color: red;">*</span></label>
                                            <input type="file" class="form-control-file" id="photo" name="photo" aria-describedby="fileHelp">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Preview <span style="color: red;">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <img id="photo_preview" src="" style="width: 180px;height: 180px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10"><br>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane card-block" id="password" role="tabpanel">
                                <div class="row">
                                    <form class="form-horizontal" action="{{route('update.password')}}" method="post">
                                        @csrf
                                        <div class="media stream-item">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Old Password<span style="color: red;">*</span></label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New Password<span style="color: red;">*</span></label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Confirm Password<span style="color: red;">*</span></label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10"><br>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!---image preview jquery plagin-->
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#photo").change(function() {
            readURL(this);
        });
    </script>
@endsection