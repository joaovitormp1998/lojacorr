@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Olá {{ Auth::user()->name }}
                , bom dia!</h1>

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-home fa-3x me-3"></i>
                                <div>
                                    <h2 class="card-title">4</h2>
                                    <p class="card-text">Imóveis cadastrados</p>
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
                                    <h2 class="card-title">9</h2>
                                    <p class="card-text">Categorias cadastradas</p>
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
                                    <h2 class="card-title">4</h2>
                                    <p class="card-text">Subcategorias cadastradas</p>
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
                                    <h2 class="card-title">5</h2>
                                    <p class="card-text">Usuarios cadastrados</p>
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
                    <h2 class="card-title m-0">Cadastro de Imóveis</h2>
                    <a href="#" class="btn btn-primary">Novo Imóvel</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Imóvel</th>
                                <th>Data</th>
                                <th>Responsável</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
