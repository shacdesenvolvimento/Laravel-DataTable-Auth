
@extends('layouts.menu')
@section('conteudo')



<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>

   
    <!-- Inclua o DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <!-- Inclua o DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <!-- Inclua o DataTables ColSearch Extension JavaScript (se estiver usando) -->
    <script src="https://cdn.datatables.net/colsearch/1.3.0/js/dataTables.colSearch.min.js"></script>
<div class="card">
    <div class="row">
        <div class="col">
            <h5 class="card-header">Empresas</h5><p>
            <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalCenter"
            
        >
            Nova
            </button>
        </div>
        
        
         
    </div>
    <table id="example" class="display nowrap" style="width:100%">
      <thead>
          <tr>
            <th style="text-align: center">Codigo<br><input type="text" class="form-control column_search" id="colSearch_codigo"></th>
            <th>Nome<br><input type="text" class="form-control column_search" id="colSearch_nome"></th>
            <th>Razão social<br><input type="text" class="form-control column_search" id="colSearch_razao"></th>
            <th>Cnpj<br><input type="text" class="form-control column_search" id="colSearch_cnpj"></th>
            <th>Telefone<br><input type="text" class="form-control column_search" id="colSearch_telefone"></th>
            <th>Ações</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($empresas as $item)
            <tr>
              <td style="text-align: center">{{$item->id}}</td>      
              <td>{{$item->nome}}</td>  
              <td>{{$item->razao_social}}</td>  
              <td>{{$item->cnpj}}</td>  
              <td>{{$item->telefone}}</td>             
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a href="{{ route('editar_empresa', ['id'=> $item->id]) }}"><i class="bx bx-edit-alt me-1"></i> Edit </a>

                    <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir o produto?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>
  
                    <form id="delete-form-{{ $item->id }}" action="{{ route('empresas.destroy', ['id'=> $item->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                  </div>
                </div>
              </td>
            </tr>
        @endforeach
      </tbody>
      <tfoot>
          <tr>
            <th style="text-align: center">Codigo<br><input type="text" class="form-control column_search" id="colSearch_codigo"></th>
            <th>Nome<br><input type="text" class="form-control column_search" id="colSearch_nome"></th>
            <th>Razão social<br><input type="text" class="form-control column_search" id="colSearch_razao"></th>
            <th>Cnpj<br><input type="text" class="form-control column_search" id="colSearch_cnpj"></th>
            <th>Telefone<br><input type="text" class="form-control column_search" id="colSearch_telefone"></th>
            <th>Ações</th>
          </tr>
      </tfoot>
  </table>

  <script>
      new DataTable('#example', {
          layout: {
              topStart: {
                  buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
              }
          },
          columnDefs: [
              {
                  targets: '_all',
                  searchable: true
              }
          ],
          initComplete: function () {
              this.api().columns().every( function () {
                  var that = this;

                  $('input', this.header()).on('keyup change clear', function () {
                      if (that.search() !== this.value) {
                          that.search(this.value).draw();
                      }
                  });
              });
          }
      }); 
  </script>

</div>
<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">
      
            Nova Empresa
          </h5>
        
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form method="POST" action="{{ route('empresas.criar') }}">
              @csrf
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Name</label>
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Enter Name" />
            </div>
            <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Razão Social</label>
                <input type="text" id="razao_social" name="razao_social" class="form-control" placeholder="Enter Name" />
              </div>
          </div>
          
        <div class="row gy-3">
          <div class="col-md">
            <label for="defaultSelect" class="form-label">Cnpj</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Enter Name" />
          </div>
        <div class="col-md">
          <label for="defaultSelect" class="form-label">Telefone</label>
          <input type="telefone" class="form-control" id="telefone" name="telefone" maxlength="15">
        </div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          
            @csrf
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
    
  </div>
  {{-- fim modal --}}
  <script src="../assets/js/mask.js"></script>
  @endsection


    
