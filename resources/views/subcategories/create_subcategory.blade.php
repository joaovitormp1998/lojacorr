@extends('layouts.layout')

@section('title', 'Create Subcategory')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Subcategory</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('subcategories.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="">Select Category</option>
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

                        <div class="form-group">
                            <label for="name">Subcategory Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
