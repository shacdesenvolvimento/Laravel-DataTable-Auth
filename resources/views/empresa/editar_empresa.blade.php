@extends('layouts.menu_financeiro')
@section('conteudo')
<div class="">
    <div class="">
        
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">
      
            Empresa
          </h5>
        
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            onclick="goBack()"
          ></button>
        </div>
        <div class="modal-body">
              <div class="row">
                <form method="POST" action="{{ route('empresas.update') }}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$empresa->id}}">
                  <div class="col-mb-3">
                    <label for="defaultSelect" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{$empresa->nome}}" class="form-control" style="width:40%">
                  </div>       
                  </p>
                  <div class="col-mb-3">
                    
                    <label for="defaultSelect" class="form-label">Razão Social</label>
                    <input type="text" name="razao_social" id="razao_social" value="{{$empresa->razao_social}}" class="form-control" style="width:40%">
                  </div>      
                  </div>
                  <div class="row gy-3">
                    <div class="col-md">
                      <label for="defaultSelect" class="form-label">Cnpj</label>
                      <input type="text" name="cnpj" id="cnpj" value="{{$empresa->cnpj}}" class="form-control" style="width:40%">
                    </div>
                  <div class="col-md">
                    <label for="defaultSelect" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" value="{{$empresa->telefone}}" class="form-control" style="width:40%">
                  </div>
                </div>
                <hr style="color: brown">
                </p>
                
                <hr style="color: brown">
            </p>
            <h5 class="modal-title" id="modalCenterTitle">
        
              Socios
            </h5>
          </p>
          <div class="col-auto">
            <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalCenter"
            
        >
            Adicionar Socios
            </button>

          
        </div>
          <div class="table-responsive text-nowrap">

            <table class="table">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($empresa_socios as $item) 
                      
                  
                <tr>
                  <td><strong>{{$item->id}}</strong>
                </td>     
                  <td>{{$item->socio->nome}}</td>  
                  <td>{{$item->socio->telefone}}</td> 
                
                </tr>
                @endforeach
              </tbody>
              <tfoot class="table-border-bottom-0">
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                </tr>
              </tfoot>
      
              
      
      
      
            </table>
          </div>
            {{-- lista fim --}}
            </div>
            <div class="modal-footer">
                <a href="{{route('empresas')}}">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" >
              Close
            </button>
                </a>
            
            
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
    
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">
            Novo Socio
          </h5>
        
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close" onclick="goBack()">
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form method="POST" action="{{ route('empresas_socio.criar') }}" >
                @csrf
                  
                  <input type="hidden" id="id_empresa" name="id_empresa" value="{{$empresa->id}}">

              </div>
              
        
            <hr style="color: brown">
            </p>
            <h5 class="modal-title" id="modalCenterTitle">
        
              
            </h5>
          </p>
              
             </p>
            <div class="row gy-3">
             
              <div class="col-md">
                <label for="defaultSelect" class="form-label">Socios</label>
                <select id="id_socio"  name="id_socio" class="form-select">
                    <option>Selecione socio</option>
                    @foreach ($socios as $socio)
                      <option value="{{$socio->id}}">{{$socio->nome}}</option>
                    @endforeach                
                  </select>
              </div>
              
            </div>
            </p>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            
              
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
    
  </div>
  {{-- fim modal --}}
  @endsection
  <script>
    function goBack() {
        window.history.back();
    }
</script>