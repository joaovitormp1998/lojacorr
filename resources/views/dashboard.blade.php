@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <Saudacao :username="{{ json_encode(Auth::user()->name) }}"></Saudacao>

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-home fa-3x me-3"></i>
                                <div>
                                    <h2 class="card-title">{{ $totalProperties }}</h2>
                                    <p class="card-text">Propriedades Registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt fa-3x me-3"></i>
                                <div>
                                    <h2 class="card-title">{{ $totalCategories }}</h2>
                                    <p class="card-text">Categorias Registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-city fa-3x me-3"></i>
                                <div>
                                    <h2 class="card-title">{{ $totalSubcategories }}</h2>
                                    <p class="card-text">Subcategorias Registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-flag fa-3x me-3"></i>
                                <div>
                                    <h2 class="card-title">{{ $totalUsers }}</h2>
                                    <p class="card-text">Usuarios Registrados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
                    <h2 class="card-title m-0">Registros de Propriedade</h2>
                    <a href="{{ route('properties.create') }}" class="btn btn-primary">Nova Propriedade</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Responsável</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Categoria</th>
                                <th>Subcategoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($property->date)->format('d/m/Y') }}</td>
                                <td>{{ $property->user->name }}</td>
                                <td>R$ {{ number_format($property->value, 2, ',', '.') }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->category->name }}</td>
                                <td>{{ $property->subcategory->name }}</td>
                                <td>
                                    <!-- Botão para abrir o modal de edição -->
                                    <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $property->id }}">
                                        Editar
                                    </button>
                                    <!-- Modal de Edição -->
                                    <div class="modal fade" id="editModal{{ $property->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $property->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $property->id }}">Editar Propriedade</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('properties.update', ['property' => $property->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="editName{{ $property->id }}" class="form-label">Nome</label>
                                                            <input type="text" class="form-control" id="editName{{ $property->id }}" name="editName" value="{{ $property->name }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editValue{{ $property->id }}" class="form-label">Valor</label>
                                                            <input type="text" class="form-control" id="editValue{{ $property->id }}" name="editValue" value="{{ $property->value }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editResponsible{{ $property->id }}" class="form-label">Responsável</label>
                                                            <input type="text" class="form-control" id="editResponsible{{ $property->id }}" name="editResponsible" value="{{ $property->user->name }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botão para deletar (exemplo) -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $property->id }}">
                                        Deletar
                                    </button>
                                    <!-- Modal de Exclusão -->
                                    <div class="modal fade" id="deleteModal{{ $property->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $property->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $property->id }}">
                                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                                        Atenção!
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tem certeza que deseja deletar esta propriedade? Esta ação não poderá ser desfeita.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('properties.destroy', ['property' => $property->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
