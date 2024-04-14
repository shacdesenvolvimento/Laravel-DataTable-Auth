@extends('layouts.layoutlogin')
@section('conteudo')

<div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                
                <img src="../assets/img/logo.jpg" alt class="" width="100"  />
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Seja bem vindo a Vox! 👋</h4>
              <p class="mb-4">Por favor insira seus dados para acessar</p>
              @if($mensagem=Session::get('erro'))
              <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">{{$mensagem}}</h5>
              </div>
              @endif
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  <h5 class="alert-heading">
                  @foreach ($errors->all() as $error)
                  {{$error}}
                  @endforeach
                </h5>
              </div>
                @endif

              <form id="formAuthentication" class="mb-3" action="{{route('login.auth')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus="">
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me">
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Logar</button>
                </div>
              </form>

              <p class="text-center">
                <span>Novo na plataforma?</span>
                <a href="{{'criar_login'}}">
                  <span>Crie uma conta</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
        @endsection