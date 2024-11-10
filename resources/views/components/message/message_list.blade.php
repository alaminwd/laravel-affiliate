<div class="container">
    <div class="row mt-5">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-info">
                    <h3 class="text-white">Message List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTableExample">
                        <thead>
                            <tr class="bg-light">
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                            @foreach ($messages as $sl=>$msg)
                                <tr class="bg-{{$msg->sts=='0'? 'light': ''}}">
                                    <td>{{$sl+1}}</td>
                                    <td>{{$msg->name}}</td>
                                    <td>{{$msg->email}}</td>
                                    <td>{{substr($msg->desp, 0 ,30)}}</td>
                                    <td>
                                        <form action="{{url('message/reply')}}" method="GET" class="d-inline">
                                            @csrf
                                            <button name="id" value="{{$msg->id}}" class="btn btn-info text-white">Reply</button>
                                        </form>
                                        <button data-id="{{$msg->id}}" class="btn btn-danger delete-message">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{$messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


