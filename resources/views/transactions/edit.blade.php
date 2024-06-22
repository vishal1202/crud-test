

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>
    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="material_id">Material</label>
            <select id="material_id" name="material_id" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}" {{ $transaction->material_id == $material->id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $transaction->date }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" step="0.01" id="quantity" name="quantity" class="form-control" value="{{ $transaction->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
