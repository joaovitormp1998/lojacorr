@extends('layouts.layout')

@section('title', 'Cadastrar Nova Propriedade')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cadastrar Propriedade</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('properties.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="category_id">Categoria</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="">Selecionar Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="subcategory_id">Subcategoria</label>
                            <select id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" required>
                                <option value="">Selecionar Subcategoria</option>
                            </select>
                            <div id="subcategory-spinner" class="spinner-border spinner-border-sm text-primary" role="status" style="display: none;">
                                <span class="sr-only">Carregando...</span>
                            </div>

                            @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Nome da Propriedade</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Data</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="value">Valor</label>
                            <input id="value" type="number" step="0.01" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value">

                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Active">Ativo</option>
                                <option value="Inactive">Inativo</option>
                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="responsible">Responsável</label>
                            <input id="responsible" type="text" class="form-control @error('responsible') is-invalid @enderror" name="responsible" value="{{ old('responsible') }}" required autocomplete="responsible">

                            @error('responsible')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Criar Propriedade</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Overlay escuro para mostrar durante o carregamento -->
<div id="overlay"></div>

<!-- JavaScript para carregar subcategorias dinamicamente -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_id');
        const subcategorySelect = document.getElementById('subcategory_id');
        const subcategorySpinner = document.getElementById('subcategory-spinner');
        const overlay = document.getElementById('overlay');

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>'; // Limpa as opções anteriores

            if (categoryId) {
                overlay.style.display = 'block'; // Mostra o overlay escuro
                subcategorySpinner.style.display = 'inline-block';
                fetch(`/api/categories/${categoryId}/subcategories`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        data.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                        subcategorySpinner.style.display = 'none';
                        overlay.style.display = 'none'; // Esconde o overlay após carregar os dados
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                        subcategorySpinner.style.display = 'none';
                        overlay.style.display = 'none'; // Esconde o overlay em caso de erro
                    });
            }
        });
    });
</script>
@endsection
