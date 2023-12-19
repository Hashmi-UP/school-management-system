
@extends('../layouts.teachermaster2')

@section('content')
    <div class="page-body" >
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Announcement</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Announcement</li>
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
                                <th class="f-22">Topic</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Message</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($announce as $announce)
                                <tr>
                                    <td>
                                        <div class="d-inline-block"><span>{{$announce->topic}}</span></div>
                                    </td>
                                    <td>{{$announce->date}}</td>
                                    <td>{{$announce->day}}</td>
                                    <td>{{$announce->message}}</td>
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
