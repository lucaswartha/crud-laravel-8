@extends('layouts.app')

@section('content')

<div class="container ">


    <div class="row ">
        <div class="col-sm ">
            <button class="btn btn-success mb-3 " data-bs-toggle="modal" data-bs-target="#insertModal">Adicionar
                novo veículo<a href=" "></a></button>
        </div>


    </div>

    <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motos as $moto)
                <tr>
                    <th scope="row">{{ $moto->modeloMoto }}</th>
                    <td>{{ $moto->marcaMoto }}</td>
                    <td>{{ $moto->anoMoto }}</td>
                    <td> <img src="{{ asset('uploads/carros/'.$moto->imagemMoto) }}" alt="foto">  </td>
                    <td><button class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#editarModal">Editar</button><button class="btn btn-danger mb-3"
                            data-bs-toggle="modal" data-bs-target="#deletarModal">Excluir</button></td>
                </tr>
                @endforeach
            </tbody>
    </table>
    <hr>

    @if (isset($filters))
        {{ $motos->appends($filters)->links() }}
    @else
        {{ $motos->links() }}
    @endif


    <!-- INSERT MODAL -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Adicionar veículo </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeMotos') }}" enctype="multipart/formdata" method="get">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloMoto" name="modeloMoto"
                                value="{{ old('modeloMoto') }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Marca</label>
                            <input type="text" class="form-control" id="marcaMoto" name="marcaMoto"
                                value="{{ old('marcaMoto') }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label ">Ano</label>
                            <input type="text" class="form-control" id="anoMoto" name="anoMoto"
                                value="{{ old('anoMoto') }}">
                        </div>
                        <div class="mb-3 ">
                            <label for="message-text" class="col-form-label ">Foto</label>
                            <input type="file" class="col-form-label" name="imagemMoto" id="imagemMoto" value="{{ old('imagemMoto') }}">
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
                    <h5 class="modal-title">Você tem certeza que deseja excluir o {{ $moto->modeloMoto }}</h5>
                </div>
                <form action="{{ route('destroyMotos', $moto->id) }}" method="post" enctype="multipart/formdata">
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
                    <form action="{{ route('updateMotos', $moto->id)}}" enctype="multipart/formdata" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Modelo</label>
                            <input type="text" class="form-control" name="modeloMoto" id="modeloMoto" value="{{ $moto->modeloMoto }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Marca</label>
                            <input type="text" class="form-control" name="marcaMoto" id="marcaMoto" value="{{ $moto->marcaMoto }}">
                        </div>
                        <div class="mb-3 ">
                            <label for="message-text" class="col-form-label">Ano</label>
                            <input type="text" class="form-control" name="anoMoto" id="anoMoto" value="{{ $moto->anoMoto }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Foto</label>
                            <input type="file" class="col-form-label" name="imagemMoto" id="imagemMoto" value="{{ $moto->imagemMoto }}">
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


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js "
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous ">
</script>


@endsection

