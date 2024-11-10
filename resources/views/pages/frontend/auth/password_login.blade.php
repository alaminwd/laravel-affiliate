@extends('layouts.master')

@section('header')
    <title>Customer Login</title>
@endsection

@section('content')
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
              <div class="title text-center">
                <img src="images/password-encrypt.png" alt="">
                <h4 class="mt-3">Homepage is encrypted, please enter password
                </h2>
              </div>
                <form action="" method="">
                    <div class="mb-4">
                      <label for="">Password</label>
                      <input type="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="mb-4">
                      <button type="button" class="w-100 pass_login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection