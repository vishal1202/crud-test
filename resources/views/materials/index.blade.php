

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Materials</h1>
    <a href="{{ route('materials.create') }}" class="btn btn-primary mb-2">Add Material</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Opening Balance</th>
                <th>Current Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->category->name }}</td>
                <td>{{ $material->name }}</td>
                <td>{{ $material->opening_balance }}</td>
                <td>{{ $material->current_balance }}</td>
                <td>
                    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
