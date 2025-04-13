@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Stock In</h1>

    <form action="{{ route('stock-in.store') }}" method="POST">
        @csrf

        {{-- Supplier and Category Filters --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block mb-1 font-semibold">Supplier</label>
                <select name="supplier_id" class="w-full border p-2 rounded">
                    <option value="">-- Select Supplier --</option>
                    @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Category</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Autocomplete Product Search --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Search Product</label>
            <input type="text" id="product-search" class="w-full border p-2 rounded" placeholder="Type product name...">
            <ul id="product-suggestions" class="border mt-1 bg-white hidden"></ul>
        </div>

        {{-- Dynamic Product Rows --}}
        <div id="product-list" class="space-y-2 mb-4"></div>

        {{-- Total Cost --}}
        <div class="flex justify-end items-center mt-4">
            <div class="font-bold text-lg">Total: ₱<span id="total-cost">0.00</span></div>
        </div>

        {{-- Submit --}}
        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Stock In
            </button>
        </div>
    </form>
</div>

<script>
    // let products = @json($products); // Optional if you preload products
    let totalCost = 0;

    document.getElementById('product-search').addEventListener('input', function() {
        const keyword = this.value.toLowerCase();
        const suggestionBox = document.getElementById('product-suggestions');
        suggestionBox.innerHTML = '';
        suggestionBox.classList.remove('hidden');

        fetch(`/autocomplete-products?query=${keyword}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(product => {
                    const li = document.createElement('li');
                    li.textContent = product.name;
                    li.className = 'px-2 py-1 hover:bg-gray-100 cursor-pointer';
                    li.onclick = () => addProductRow(product);
                    suggestionBox.appendChild(li);
                });
            });
    });

    function addProductRow(product) {
        const container = document.getElementById('product-list');
        const div = document.createElement('div');
        div.className = "grid grid-cols-4 gap-2 items-center";
        div.innerHTML = `
            <input type="hidden" name="products[]" value="${product.id}">
            <div>${product.name}</div>
            <input type="number" name="quantities[]" min="1" value="1" class="border p-1 rounded" onchange="updateTotal()">
            <input type="number" name="costs[]" step="0.01" value="${product.cost}" class="border p-1 rounded" onchange="updateTotal()">
            <button type="button" class="text-red-500" onclick="removeRow(this)">Remove</button>
        `;
        container.appendChild(div);
        updateTotal();
        document.getElementById('product-search').value = '';
        document.getElementById('product-suggestions').innerHTML = '';
        document.getElementById('product-suggestions').classList.add('hidden');
    }

    function removeRow(btn) {
        btn.parentElement.remove();
        updateTotal();
    }

    function updateTotal() {
        let total = 0;
        const qtys = document.getElementsByName('quantities[]');
        const costs = document.getElementsByName('costs[]');
        for (let i = 0; i < qtys.length; i++) {
            total += parseFloat(qtys[i].value) * parseFloat(costs[i].value);
        }
        document.getElementById('total-cost').textContent = total.toFixed(2);
    }
</script>
@endsection