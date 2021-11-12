@extends('layouts.backend')

@section('content')
    
                <div class="card">

                    <div class="card-body">
                          <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                OutGoing</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                             {{App\Models\Sms_out::count()}}                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-play fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               SMS  Reports</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{App\Models\Sms_in::count()}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Campaigns
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{App\Models\Campaign::count()}}
                                                </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fad fa-video-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Phone Numbers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{App\Models\Contact::count()}}

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-phone fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> Outgoing  SMS Reports </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-are">
            <form class="form-inline">
                        <div class="form-group mb-3">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <?php $statuses= App\Models\Status::where('status_category','SMS')->pluck('name','id')->prepend('Select Status','')  ?>
                        <?php echo Form::select('status_id',$statuses,null,['class'=>'form-control']) ?>
                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="From">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="To">
                        </div>
                        <br/>
                        <div class="form-group mx-sm-3 mb-1">
                            <select  name="report_type" class="form-control">
                                <option  value="CSV"> CSV</option>
                                <option  value="PDF"> PDF</option>
                            </select>

                        </div>

                        

                        <button type="submit" class="btn btn-primary mb-2"> <i
                                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>
               
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> Incoming  SMS Reports </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-are">
            <form class="form-inline">
                        <div class="form-group mb-3">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <?php $statuses= App\Models\Status::where('status_category','SMS')->pluck('name','id')->prepend('Select Status','')  ?>
                        <?php echo Form::select('status_id',$statuses,null,['class'=>'form-control']) ?>
                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="From">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="To">
                        </div>
                        <br/>
                        <div class="form-group mx-sm-3 mb-1">
                            <select  name="report_type" class="form-control">
                                <option  value="CSV"> CSV</option>
                                <option  value="PDF"> PDF</option>
                            </select>

                        </div>

                        

                        <button type="submit" class="btn btn-success mb-2"> <i
                                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>
               
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> Campaigns </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-are">
            <form class="form-inline">
                        <div class="form-group mb-3">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <?php $statuses= App\Models\Status::where('status_category','SMS')->pluck('name','id')->prepend('Select Status','')  ?>
                        <?php echo Form::select('status_id',$statuses,null,['class'=>'form-control']) ?>
                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="From">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="To">
                        </div>
                        <br/>
                        <div class="form-group mx-sm-3 mb-1">
                            <select  name="report_type" class="form-control">
                                <option  value="CSV"> CSV</option>
                                <option  value="PDF"> PDF</option>
                            </select>

                        </div>

                        

                        <button type="submit" class="btn btn-warning mb-2"> <i
                                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>
               
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> Contacts </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-are">
            <form class="form-inline">
                        <div class="form-group mb-3">
                            <label for="staticEmail2" class="sr-only">Email</label>
                            <?php $statuses= App\Models\Status::where('status_category','SMS')->pluck('name','id')->prepend('Select Status','')  ?>
                        <?php echo Form::select('status_id',$statuses,null,['class'=>'form-control']) ?>
                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="From">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="password" class="form-control" id="from_date" placeholder="To">
                        </div>
                        <br/>
                        <div class="form-group mx-sm-3 mb-1">
                            <select  name="report_type" class="form-control">
                                <option  value="CSV"> CSV</option>
                                <option  value="PDF"> PDF</option>
                            </select>

                        </div>

                        

                        <button type="submit" class="btn btn-primary mb-2"> <i
                                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>
               
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<!-- <div class="col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown 
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              
            </div>
        </div>
        <!-- Card Body 
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"> ..</canvas>
            </div>
         
        </div>
    </div>
</div> -->
</div>

                    </div>
                
           
@endsection
