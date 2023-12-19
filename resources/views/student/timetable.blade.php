
@extends('../layouts.studentmaster')

@section('content')
    <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Time Table</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Lectures</li>
                  </ol>
                </div>
              </div>
              <br>
              <br>
            </div>

          </div>


          <!-- Container-fluid starts-->


          <!-- Container-fluid Ends-->

          <!-- Container-fluid starts-->




          <div class="col-xl-9 xl-100 box-col-12" style="text-align: center">
            <div class="row" style="text-align: center">

              <div class="col-xl-12">
                <div class="card"   >
                  <div class="card-body" >
                    <div class="best-seller-table responsive-tbl">
                      <div class="item">
                        <div class="table-responsive product-list">
                          <table class="table table-bordernone">
                            <thead>
                              <tr>
                                <th>Course Name</th>
                                <th>Class</th>
                                <th>Teacher Name</th>
                                <th>Teacher ID</th>
                                <th>Time</th>
                                <th>Day</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($lecture as $lecture)
                                <tr>
                                    <td>{{$lecture->sno}}</td>
                                    <td>{{$lecture->class}}</td>
                                    <td>{{$lecture->teachername}}</td>
                                    <td>{{$lecture->teacherid}}</td>
                                    <td>{{$lecture->time}}</td>
                                    <td>{{$lecture->day}}</td>

                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Container-fluid Ends-->
        </div>


@endsection
