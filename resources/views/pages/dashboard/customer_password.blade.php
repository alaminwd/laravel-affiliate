@extends('layouts.sideNav')

@section('content')
    @can('customer_password')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="hidden" class="form-control" id="id" value="{{$customer->id}}">
                            <input type="password" class="form-control" id="password" value="{{$customer->password}}">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-info text-white pass_btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection

@section('footer_script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.pass_btn', function(){
                let id = $('#id').val();
                let password = $('#password').val();
                $.ajax({
                    url: "customer-password-update",
                    type: "POST",
                    data: {id:id,password:password},
                    success: function(res){
                        toastify().success('Password Updated Successfull!');
                    }
                });
            })
        });
    </script>
@endsection