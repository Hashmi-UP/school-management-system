
@extends('../layouts.teachermaster2')

@section('content')
    <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Attendance</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Attendance Data</li>
                  </ol>
                </div>
              </div>
              <br>
              <br>
            </div>

          </div>


          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                      <h5>Select Class</h5>
                  </div>
                  <div class="card-body">
                    <form class="needs-validation" action="/attendancedata" method="POST">
                        @csrf
                      <div class="row g-3">
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">Select Class</label>
                          <select name="class" class="form-select" id="validationDefault04" required="">
                            <option selected="" disabled="" value="{{$class}}">Choose...</option>
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
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">Date</label>
                            <input class="datepicker-here form-control digits" name="date" type="text" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="top right" value="{{$date}}">
                            <span class="text-danger">@error('date') {{$message}}@enderror</span>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label class="form-label" for="validationCustomUsername">Time</label>
                            <input class="form-control digits" name="time" type="time"  data-bs-original-title="" title="" value="{{$time}}">
                        </div>


                      </div>
                      <div class="row g-3">



                      </div>
                      <div class="mb-3">
                        <div class="form-check">

                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->

          <!-- Container-fluid starts-->



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
        <form action="/attendancemark" method="POST">
            @csrf
          <div class="container-fluid">
            <div class="row">
              <!-- Individual column searching (text inputs) Starts-->
              <div class="col-sm-12">
                <div class="card">

                  <div class="card-body">
                    <div class="table-responsive product-table">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Roll#</th>
                            <th>Name</th>
                            <th>class</th>
                            <th>Attendance</th>
                          </tr>
                        </thead>
                        <tbody >
                            <tr>

                            </tr>
                            @foreach ($attdata as $key => $attdata)
                            <tr>

                                <input class="datepicker-here form-control digits" name="date" type="hidden" data-language="en" data-multiple-dates-separator=", " data-position="top right" placeholder="top right" value="{{$date}}">
                                <input class="form-control" name="time" id="sno" type="hidden" placeholder="" data-bs-original-title="" title="" value={{$time}}>

                                <td><h6> {{$attdata->regno}} </h6></td>
                                <input class="form-control" name="regno" id="sno" type="hidden" placeholder="" data-bs-original-title="" title="" value={{$attdata->regno}}>


                                <td>{{$attdata->studentname}}</td>
                                <input class="form-control" name="studentname" id="sno" type="hidden" placeholder="" data-bs-original-title="" title="" value={{$attdata->studentname}}>


                                <td >{{$attdata->class}}</td>
                                <input class="form-control" name="class" id="sno" type="hidden" placeholder="" data-bs-original-title="" title="" value={{$attdata->class}}>


                               <td><div class="form-check">
                                <input type="checkbox" name="attendance" value="present" id="flexCheckChecked" checked>
                                </div></td>
                            </tr>

                            @endforeach

                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <!-- Individual column searching (text inputs) Ends-->
            </div>
           <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
          <!-- Container-fluid Ends-->
        </div>


@endsection
