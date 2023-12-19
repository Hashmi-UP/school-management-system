@extends('../layouts/adminmaster2')

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Update Teacher</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Update Teacher</li>
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


                      <form class="theme-form"  method="POST" action="/editteacherdb" enctype="multipart/form-data">
                        @csrf

                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong></strong>{{Session::get('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong></strong>{{Session::get('fail')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                        <!--Alert start-->
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert"><strong>Alert! &nbsp;</strong>{{ $error }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endforeach
                        @endif
                        <!--Alert End-->

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Sno</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <label class="col-sm-5 col-form-label text-sm-end"><h4>{{$data1->sno}}</h4></label>
                                <span class="text-danger">@error('sno') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>


                        <input class="form-control" name="sno" id="sno" type="hidden" placeholder="" data-bs-original-title="" title="" value={{$data1->sno}}>


                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Teacher Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="teachername" id="teachername" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->name}}">
                                <span class="text-danger">@error('teachername') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">First Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="firstname" id="firstname" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->firstname}}">
                                <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Last Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="lastname" id="lastname" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->lastname}}">
                                <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end"> Age</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="touchspin form-control" name="age" id="age" type="text" style="display: block;" data-bs-original-title="" title="" value="{{$data1->age}}">
                                <span class="text-danger">@error('age') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>


                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Contact #</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="phone" id="contact" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->phone}}">
                                <span class="text-danger">@error('phone') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Email</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="email" id="contact" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->email}}">
                                <span class="text-danger">@error('email') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Address</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="address" id="address" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->address}}">
                                <span class="text-danger">@error('address') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Main Subject</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="mainsubject" id="mainsubjact" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->mainsubject}}">
                                <span class="text-danger">@error('mainsubject') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Passowrd</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="password" id="pwd" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->password}}">
                                <span class="text-danger">@error('mainsubject') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <input type="hidden" id="doj" name="doj" value="{{$data1->doj}}">




                        <div class="col-md-12 text-center">
                            <br>
                            <button class="btn btn-primary active" type="submit" title="" data-bs-original-title="" data-original-title="btn btn-secondary active">Update</button>
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

@endsection
