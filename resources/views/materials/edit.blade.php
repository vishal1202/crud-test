

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Material</h1>
    <form method="POST" action="{{ route('materials.update', $material->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $material->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Material Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $material->name }}" required>
        </div>
        <div class="form-group">
            <label for="opening_balance">Opening Balance</label>
            <input type="number" step="0.01" id="opening_balance" name="opening_balance" class="form-control" value="{{ $material->opening_balance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
