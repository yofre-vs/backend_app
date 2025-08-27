@extends('ws::Layouts.basic.main_auth')

@section('title', 'Citv\'s UpGrade - Ingreso')

@section('content')

    <div class="login" >
          <div class="auth-top  text-center">
            <img src="{{ asset('assets/shared/images/logo.png') }}">
            <p class="text-center"><strong>Iniciar sesión</strong><br/>Introduce tus credenciales para acceder a tu cuenta.</p>
            <div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            </div>
          </div>
          <div class="auth-bottom">
            

            <form  method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-group" >
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DNI, Carnet Exranjeria ó Pasaporte" name="username">
                  <small id="emailHelp" class="form-text text-muted">Ejm: 04544120, CE201245 ó VEN40740030</small>
                </div>
                <div class="form-group pb-5">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-check">
                  <!--<input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
             </form>

          </div>
      </div>

       
     
 @endsection