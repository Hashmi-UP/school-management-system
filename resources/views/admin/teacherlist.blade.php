@extends('../layouts.adminmaster2')

@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Teacher Data</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Teacher Data</li>
                  </ol>
                </div>
              </div>
              <br>
              <a href="/addteacher"><button style="float: right" class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="" data-original-title="btn btn-primary" aria-describedby="tooltip554213">Add Teacher</button></a>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Main Subject</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data1 as $key => $data1)
                            <tr>

                                <!--<td><img src="'../public/images/'+$data1->image+'.'png'" alt=""></td>-->
                                <td> <img  width="50px" class="rounded-circle z-depth-2" src="{{asset('./images/'.$data1->image)}}"></td>

                                <td><h6> {{$data1->name}} </h6></td>

                                <td>{{$data1->mainsubject}}</td>

                                <td class="font-success">{{$data1->email}}</td>

                                <td>{{$data1->phone}}</td>

                                <td>
                                    <a href = 'deleteteacher/{{ $data1->sno }}'><button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                    <a href = 'editteacher/{{ $data1->sno }}'><button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
                                </td>

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
