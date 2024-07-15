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
                    <a href="#" class="btn btn-primary">Nova Propriedade</a>
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
                                <td>{{ $property->date }}</td>
                                <td>{{ $property->user->name }}</td>
                                <td>{{ $property->value }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->category->name }}</td>
                                <td>{{ $property->subcategory->name }}</td>
                                <td>
                                    <!-- Aqui você pode adicionar ações como editar e deletar -->
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
