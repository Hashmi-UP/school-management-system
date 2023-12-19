@extends('../layouts/adminmaster2')

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Add Teacher</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Add Teacher</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h5>Add Teacher</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="date-picker">


                      <form class="theme-form"  method="POST" action="/addteacherdb" enctype="multipart/form-data">
                        @csrf

                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong></strong>{{Session::get('success')}}
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong></strong>{{Session::get('fail')}}
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                        <!--Alert start-->
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert"><strong>Alert! &nbsp;</strong>{{ $error }}
                            <button class="close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endforeach
                        @endif
                        <!--Alert End-->

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Sno</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="sno" id="name" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('sno') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Teacher Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="teachername" id="name" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('teachername') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">First Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="firstname" id="firstname" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Last Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="lastname" id="lastname" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end"> Age</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="touchspin form-control" name="age" id="age" type="text" value="" style="display: block;" data-bs-original-title="" title="">
                                <span class="text-danger">@error('age') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end"> Gender</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="gender" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                                <span class="text-danger">@error('age') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end"> Religion</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="religion" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Muslim</option>
                                    <option>Christian</option>
                                    <option>Other</option>
                                  </select>
                                <span class="text-danger">@error('age') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>



                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Contact #</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="phone" id="contact" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Email</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="email" id="contact" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('email') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Address</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="address" id="address" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('address') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Main Subject</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="mainsubject" id="mainsubjact" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('mainsubject') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Passowrd</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="password" id="pwd" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('mainsubject') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>


                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Confirm Password</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="cpassword" id="cpwd" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('mainsubject') {{$message}}@enderror</span>

                              </div>
                              <div id="showErrorcPwd"></div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                          <label class="col-sm-3 col-form-label text-sm-end">Date of Joining</label>
                          <div class="col-xl-5 col-sm-9">
                            <div class="form-row">
                                <div class="col-md-12 mb-2">
                                    <input class="datepicker-here form-control digits" name="doj" type="text" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="top right">
                                    <span class="text-danger">@error('doj') {{$message}}@enderror</span>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Photo</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input name="image" class="form-control" type="file" data-bs-original-title="" title="">
                                <span class="text-danger">@error('image') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <br>
                            <button class="btn btn-primary active" type="submit" title="" data-bs-original-title="btn btn-primary active" data-original-title="btn btn-secondary active">Add</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>



    @include('sweetalert::alert')

    @endsection
