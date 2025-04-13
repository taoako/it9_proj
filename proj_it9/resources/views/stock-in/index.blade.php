<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="form-section">
            <h2 class="mb-4">Stock In</h2>
            <form action="{{ route('stockin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search for product...">
                </div>

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select class="form-select" id="supplier_id" name="supplier_id">
                        <option value="1">Coca-Cola</option>
                        <option value="2">Yamaha</option>
                        <option value="3">Shell</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>

                <div class="mb-3">
                    <label for="date_received" class="form-label">Date Received</label>
                    <input type="date" class="form-control" id="date_received" name="date_received" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Stock</button>
            </form>
        </div>
    </div>
</body>

</html>