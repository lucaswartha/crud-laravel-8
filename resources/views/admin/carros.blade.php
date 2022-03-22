@extends('layouts.app')
@section('content')
<div class="container ">


    <div class="row ">
        <div class="col-sm ">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#insertModal">Adicionar
                novo veículo</button>
        </div>
        

    </div>

    <table class="table table-dark ">
        <thead>
            <tr>
                <th scope="col ">Modelo</th>
                <th scope="col ">Marca</th>
                <th scope="col ">Ano</th>
                <th scope="col ">Imagem</th>
                <th scope="col ">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carros as $carro)
            <tr>
                <th scope="row ">{{ $carro->modeloCarro }}</th>
                <td>{{ $carro->marcaCarro }}</td>
                <td>{{ $carro->anoCarro }}</td>
                <td> <img src="{{ asset('uploads/carros/'.$carro->imagemCarro) }}" alt="foto">  </td>
                <td><button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button><button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deletarModal">Excluir</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    @if (isset($filters))
        {{ $carros->appends($filters)->links() }}
    @else
        {{ $carros->links() }}
    @endif


    <!-- INSERT MODAL -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Adicionar veículo </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeCarros') }}" enctype="multipart/form-data" method="get">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloCarro" name="modeloCarro"
                                value="{{ old('modeloCarro') }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Marca</label>
                            <input type="text" class="form-control" id="marcaCarro" name="marcaCarro"
                                value="{{ old('marcaCarro') }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label ">Ano</label>
                            <input type="text" class="form-control" id="anoCarro" name="anoCarro"
                                value="{{ old('anoCarro') }}">
                        </div>
                        <div class="mb-3 ">
                            <label for="message-text" class="col-form-label ">Foto</label>
                            <input type="file" class="form-control" name="imagemCarro" id="imagemCarro" value="{{ old('imagemCarro') }}">
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE MODAL -->
    <div class="modal fade" id="deletarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Você tem certeza que deseja excluir o {{ $carro->modeloCarro }}</h5>
                </div>
                <form action="{{ route('destroyCarros', $carro->id) }}" enctype="multipart/formdata" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sim, desejo excluir!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT MODAL -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateCarros', $carro->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Modelo</label>
                            <input type="text" class="form-control" name="modeloCarro" id="modeloCarro" value="{{ $carro->modeloCarro }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Marca</label>
                            <input type="text" class="form-control" name="marcaCarro" id="marcaCarro" value="{{ $carro->marcaCarro }}">
                        </div>
                        <div class="mb-3 ">
                            <label for="message-text" class="col-form-label">Ano</label>
                            <input type="text" class="form-control" name="anoCarro" id="anoCarro" value="{{ $carro->anoCarro }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Foto</label>
                            <input type="file" class="col-form-label" name="imagemCarro" id="imagemCarro" value="{{ $carro->imagemCarro }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>


@endsection
