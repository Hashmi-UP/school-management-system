@extends('../layouts/adminmaster2')

@section('content')

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Add Lecture</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Add Lecture</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h5>Add Lecture</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="date-picker">


                      <form class="theme-form"  method="POST" action="/addtimetabledb" enctype="multipart/form-data">
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
                                <input class="form-control" name="sno" id="name" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('sno') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Course Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="coursename" id="coursename" type="text" placeholder="" data-bs-original-title="" title="" >
                                <span class="text-danger">@error('coursename') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Class</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="class" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9 (Bio)</option>
                                    <option>10 (Bio)</option>
                                    <option>9 (Comp)</option>
                                    <option>10 (Comp)</option>
                                  </select>
                                <span class="text-danger">@error('class') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Teacher Name</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="teachername" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach ($data1 as $key => $data1)
                                        <option>{{$data1->name}}</option>
                                    @endforeach
                                </select>
                                <!--<input class="form-control" name="teachername" id="lastname" type="text" placeholder="" data-bs-original-title="" title="">-->
                                <span class="text-danger">@error('teachername') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Teacher ID</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="teacherid" id="teacherid" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('teacherid') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>


                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Time</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="time" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>8:00-9:00</option>
                                    <option>9:00-10:00</option>
                                    <option>10:00-11:00</option>
                                    <option>11:00-12:00</option>
                                    <option>12:30-1:30</option>
                                    <option>1:30-2:30</option>
                                  </select>
                                <span class="text-danger">@error('time') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Day</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="day" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                  </select>
                                <span class="text-danger">@error('day') {{$message}}@enderror</span>
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
