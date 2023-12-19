@extends('../layouts.adminmaster2')

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Class List</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Class List</li>
                  </ol>
                </div>
              </div>
              <br>
              <a href="/classlist"><button style="float: right" class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="" data-original-title="btn btn-primary" aria-describedby="tooltip554213">Class List</button></a>
              <br>
            </div>

          </div>

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
                            <th>ID</th>
                            <th>Reg #</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>

                           @foreach ( $data1 as $key => $data1 )

                            <tr>

                                <td><h6> {{$data1->id}} </h6></td>

                                <td>{{$data1->regno}}</td>

                                <td >{{$data1->studentname}}</td>
                                <td>{{$data1->class}}</td>
                                <td>{{$data1->created_at}}</td>

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
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection
