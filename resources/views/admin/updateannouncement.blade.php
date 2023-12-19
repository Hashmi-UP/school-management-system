@extends('../layouts/adminmaster2')

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Update Announcement</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Update Announcement</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h5>Add Announcement</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="date-picker">


                      <form class="theme-form"  method="POST" action="/editannouncementdb" enctype="multipart/form-data">
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
                            <label class="col-sm-3 col-form-label text-sm-end">Topic</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="topic" id="teachername" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->topic}}">
                                <span class="text-danger">@error('teachername') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Message</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <input class="form-control" name="message" id="firstname" type="text" placeholder="" data-bs-original-title="" title="" value="{{$data1->message}}">
                                <span class="text-danger">@error('firstname') {{$message}}@enderror</span>
                              </div>
                            </div>
                        </div>

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Day</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="input-group">
                                <select name="day" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="{{$data1->day}}">{{$data1->day}}</option>
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

                        <div class="mb-3 row g-3">
                            <label class="col-sm-3 col-form-label text-sm-end">Date of Announcement</label>
                            <div class="col-xl-5 col-sm-9">
                              <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                      <input class="datepicker-here form-control digits" name="doa" type="text" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="{{$data1->date}}">
                                      <span class="text-danger">@error('doa') {{$message}}@enderror</span>
                                  </div>
                              </div>
                            </div>
                        </div>


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
