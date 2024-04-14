@extends('layouts.menu')
@section('conteudo')
    
    <div class="row mb-5">
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4" style="text-align:center">
                        <i class="fa-solid fa-shop fa-6x " style="padding-top:30px" ></i>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="{{'empresas'}}">
                          <h5 class="card-title">Empresas</h5>
                          <p class="card-text">
                            Clique aqui para listar, cadastrar, analisar todas as empresas ou selecione a opção empresa no menu ao lado
                          </p>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4" style="text-align:center">
                      
                        <i class="fa-solid fa-user-tie fa-6x" style="padding-top:30px"></i>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="{{'socios'}}">
                          <h5 class="card-title">Socios</h5>
                          <p class="card-text">
                          Clique aqui para listar, cadastrar, analisar todas as socios ou selecione a opção socios no menu ao lado
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection