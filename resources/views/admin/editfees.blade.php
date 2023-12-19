@extends("../layouts.adminmaster2")

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Update Fees</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Update Fees</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h5>Update Fees</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="date-picker">


                      <form class="theme-form"  method="POST" action="/editfeesdb" enctype="multipart/form-data">
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

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Class</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="class" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="{{$data1->class}}">{{$data1->class}}</option>
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
                            <label class="col-sm-3 col-form-label text-sm-end">Tution Fees</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="tutionfees" id="tutionfees" type="integer" placeholder="" data-bs-original-title="" title="" value="{{$data1->tutionfees}}">
                                <span class="text-danger">@error('tutionfees') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Library Fees</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="libraryfees" id="libfees" type="integer" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('libraryfees') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Lab Fees</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="labfees" id="labfees" type="integer" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('labfees') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Activities Fees</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="actfees" id="actfees" type="text" placeholder="" data-bs-original-title="" title="">
                                <span class="text-danger">@error('actfees') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Fine</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="touchspin form-control" name="fine" id="fine" type="integer" value="" style="display: block;" data-bs-original-title="" title="">
                                <span class="text-danger">@error('fine') {{$message}}@enderror</span>
                            </div>
                            </div>
                        </div>


                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Date</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                      <input class="datepicker-here form-control digits" name="date" type="text" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="top right">
                                      <span class="text-danger">@error('date') {{$message}}@enderror</span>
                                  </div>
                              </div>
                            </div>
                          </div>

                        <div class="mb-3 row g-3">
                        <label class="col-sm-3 col-form-label text-sm-end">Due Date</label>
                        <div class="col-xl-5 col-sm-9">
                            <div class="form-row">
                                <div class="col-md-12 mb-2">
                                    <input class="datepicker-here form-control digits" name="dod" type="text" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="top right">
                                    <span class="text-danger">@error('dod') {{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        </div>



                        <div class="col-md-12 text-center">
                            <br>
                            <button class="btn btn-primary active" type="submit" title="" data-bs-original-title="" data-original-title="btn btn-secondary active">Add</button>
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
