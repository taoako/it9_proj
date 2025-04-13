@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6">📊 Dashboard</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Stock In -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">➕ Stock In</h3>
            <p class="text-sm text-gray-600 mb-4">Add stock to inventory</p>
            <a href="{{ route('stock-in.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Go to Stock In
            </a>
        </div>

        <!-- Stock Out -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">➖ Stock Out</h3>
            <p class="text-sm text-gray-600 mb-4">Record stock out from inventory</p>
            <a href="#" class="inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Go to Stock Out
            </a>
        </div>

        <!-- Products -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">📦 Products</h3>
            <p class="text-sm text-gray-600 mb-4">Manage product listings</p>
            <a href="#" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Manage Products
            </a>
        </div>

        <!-- Suppliers -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">🚚 Suppliers</h3>
            <p class="text-sm text-gray-600 mb-4">View and manage suppliers</p>
            <a href="#" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Manage Suppliers
            </a>
        </div>

        <!-- Categories -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">📂 Categories</h3>
            <p class="text-sm text-gray-600 mb-4">Organize product categories</p>
            <a href="#" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                View Categories
            </a>
        </div>
    </div>
</div>
@endsection