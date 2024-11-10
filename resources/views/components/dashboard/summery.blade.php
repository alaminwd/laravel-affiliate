<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-4">
            {{-- <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Monthy Visitor </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">{{ $monthVisitor->count() }}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
            </div> --}}
            <div class="card">
                <div class="card-body bg-primary">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0 text-white">Monthly Visitor <span style="margin-left: 30px">{{ Carbon\Carbon::parse($monthVisitor->first()->updated_at)->format('d F Y') }}</span></h6>
                    
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="m-2 text-white"> {{ number_format($monthVisitor->count()) }}  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></h2>
                       
                    </div>
                  </div>
                </div>
              </div>
        </div>  
        <div class="col-xl-4 col-md-4">
            {{-- <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Monthy Visitor </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">{{ $monthVisitor->count() }}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
            </div> --}}
            <div class="card">
                <div class="card-body bg-primary">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0 text-white">Total Visitor </h6>
                    
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="m-2 text-white"> {{ number_format($visitors->count()) }}  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></h2>
                       
                    </div>
                  </div>
                </div>
              </div>
        </div> 
       
    </div>
<div class="row mt-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Monthly Visitor   ({{ now()->format('F') }})</h6>
                <p class="card-description">Current Date <a href="#" target="_blank">
                        {{ Carbon\Carbon::parse($monthVisitor->first()->updated_at)->format('d F Y') }}
                    </a></p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Sl</th>
                                <th>Ip</th>
                                <th>Location</th>
                                <th>Month</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monthVisitor as $sl=>$visitor)
                            <tr class="text-center">
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $visitor->ip_address }}</td>
                                <td>{{ $visitor->location }}</td>
                                <td>{{ $visitor->month }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Total Visitor</h6>
                {{-- <p class="card-description"> Current Date <a href="#" target="_blank">
                        {{ Carbon\Carbon::parse($visitors->first()->updated_at)->format('d F Y') }}
                    </a></p> --}}
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Sl</th>
                                <th>Ip</th>
                                <th>Location</th>
                                <th>Month</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $sl=>$visitor)
                            <tr class="text-center">
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $visitor->ip_address }}</td>
                                <td>{{ $visitor->location }}</td>
                                <td>{{ $visitor->month }}</td>
                                <td>
                                    <a href="{{ route('delete.visitor', $visitor->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="dataTables_paginate paging_simple_numbers ml-auto" id="dataTableExample_paginate">
                <ul class="pagination" style="margin-right: 10px">
                    <li class="paginate_button page-item previous disabled" id="dataTableExample_previous">
                        <a href="#" aria-controls="dataTableExample" data-dt-idx="0" tabindex="0"
                            class="page-link">Previous</a></li>
                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTableExample"
                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="2"
                            tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="3"
                            tabindex="0" class="page-link">3</a></li>
                    <li class="paginate_button page-item next" id="dataTableExample_next"><a href="#"
                            aria-controls="dataTableExample" data-dt-idx="4" tabindex="0" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
