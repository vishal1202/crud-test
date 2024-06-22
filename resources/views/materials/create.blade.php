

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Material</h1>
    <form method="POST" action="{{ route('materials.store') }}">
        @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Material Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="opening_balance">Opening Balance</label>
            <input type="number" step="0.01" id="opening_balance" name="opening_balance" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
