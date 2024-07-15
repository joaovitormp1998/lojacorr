@extends('layouts.layout')

@section('title', 'Create Category')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
