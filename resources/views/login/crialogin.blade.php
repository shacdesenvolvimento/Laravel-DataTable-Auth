@extends('layouts.layoutlogin')
@section('conteudo')

    
<div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center" >
                <a href="#" class="app-brand-link gap-2">
                  <img src="../assets/img/logo.jpg" alt class="" width="100"  />
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Seja Bem vindo</h4>
              <p class="mb-4">Adicione os dados para utilizar o sistema</p>

              <form id="formAuthentication" class="mb-3" action="{{route('inseri_login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus="">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Senha</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy &amp; terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="auth-login-basic.html">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
        @endsection