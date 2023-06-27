@extends('website.master')
@section('title')
    Customer Register
@endsection
@section('content')
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post" action="{{route('customer.new')}}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3 class="text-center">Register Now</h3>
                                <h4 class="text-center text-danger">{{session('message')}}</h4>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Name</label>
                                <input class="form-control" type="text" name="name" id="reg-email">
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" type="email" name="email" id="reg-email" required>
                                <span class="text-danger">{{$errors->has('email')? $errors->first('email') : ''}}</span>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Mobile Number</label>
                                <input class="form-control" type="text" name="phone_number" required>
                                <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number') : ''}}</span>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password" id="reg-pass">
                            </div>

                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already Have an Account? <a href="{{route('customer.login')}}">Login here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
