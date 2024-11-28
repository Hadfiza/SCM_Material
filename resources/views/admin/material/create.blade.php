@extends('admin.dashboard')

@section('title', 'Create Product')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script>
        let editingProductCard = null;

        function toggleForm() {
            const form = document.getElementById('add-product-form');
            form.classList.toggle('hidden');
        }

        function addProduct(event) {
            event.preventDefault();

            const name = document.getElementById('product-name').value;
            const description = document.getElementById('product-description').value;
            const price = document.getElementById('product-price').value;
            const category = document.getElementById('product-category').value;
            const stock = document.getElementById('product-stock').value;
            const image = document.getElementById('product-image').files[0];

            if (name && description && price && category && stock && image) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (editingProductCard) {
                        editingProductCard.querySelector('img').src = e.target.result;
                        editingProductCard.querySelector('img').alt = `Image of ${name}`;
                        editingProductCard.querySelector('h2').textContent = name;
                        editingProductCard.querySelector('p:nth-of-type(1)').textContent = description;
                        editingProductCard.querySelector('p:nth-of-type(2)').textContent = `$${price}`;
                        editingProductCard.querySelector('p:nth-of-type(3)').textContent = `Stock: ${stock}`;
                        editingProductCard = null;
                    } else {
                        const productGrid = document.getElementById('product-grid');
                        const productCard = document.createElement('div');
                        productCard.className = 'bg-white p-6 rounded-lg shadow-md';
                        productCard.innerHTML = `
                            <img src="${e.target.result}" alt="Image of ${name}" class="w-full h-40 object-cover mb-4 rounded-lg">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">${name}</h2>
                            <p class="text-gray-600 mb-4">${description}</p>
                            <p class="text-gray-800 font-bold mb-2">$${price}</p>
                            <p class="text-gray-600 mb-4">Stock: ${stock}</p>
                            <div class="flex justify-end space-x-2">
                                <button onclick="editProduct('${name}', '${description}', '${price}', '${category}', '${stock}', '${e.target.result}', this.parentElement.parentElement)" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Edit</button>
                                <button onclick="deleteProduct(this.parentElement.parentElement)" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                            </div>
                        `;
                        productGrid.appendChild(productCard);
                    }
                    toggleForm();
                };
                reader.readAsDataURL(image);
            } else {
                alert('Please fill in all fields and select an image.');
            }
        }

        function editProduct(name, description, price, category, stock, imageSrc, productCard) {
            document.getElementById('product-name').value = name;
            document.getElementById('product-description').value = description;
            document.getElementById('product-price').value = price;
            document.getElementById('product-category').value = category;
            document.getElementById('product-stock').value = stock;

            const imagePreview = document.createElement('img');
            imagePreview.src = imageSrc;
            imagePreview.alt = `Image of ${name}`;
            imagePreview.className = 'w-full h-40 object-cover mb-4 rounded-lg';
            document.getElementById('product-image-preview').innerHTML = '';
            document.getElementById('product-image-preview').appendChild(imagePreview);

            editingProductCard = productCard;
            toggleForm();
        }

        function deleteProduct(productCard) {
            productCard.remove();
        }
    </script>
</head>
<body class="bg-gray-100 font-roboto">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-gray-800">Material</a>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Orders</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Products</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8 flex-1">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Products</h1>
                <button onclick="toggleForm()" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add Product</button>
            </div>

            <!-- Add Product Form -->
            <div id="add-product-form" class="bg-white p-6 rounded-lg shadow-md mb-6 hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Add New Product</h2>
                <form onsubmit="addProduct(event)">
                    <div class="mb-4">
                        <label for="product-name" class="block text-gray-700 font-medium mb-2">Product Name</label>
                        <input type="text" id="product-name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product name">
                    </div>
                    <div class="mb-4">
                        <label for="product-description" class="block text-gray-700 font-medium mb-2">Product Description</label>
                        <textarea id="product-description" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Enter product description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="product-price" class="block text-gray-700 font-medium mb-2">Product Price</label>
                        <input type="number" id="product-price" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product price">
                    </div>
                    <div class="mb-4">
                        <label for="product-category" class="block text-gray-700 font-medium mb-2">Product Category</label>
                        <select id="product-category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select category</option>
                            <option value="cement">Cement</option>
                            <option value="bricks">Bricks</option>
                            <option value="steel">Steel</option>
                            <option value="wood">Wood</option>
                            <option value="paint">Paint</option>
                            <option value="tiles">Tiles</option>
                            <option value="plumbing">Plumbing</option>
                            <option value="electrical">Electrical</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="product-stock" class="block text-gray-700 font-medium mb-2">Product Stock</label>
                        <input type="number" id="product-stock" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product stock">
                    </div>
                    <div class="mb-4">
                        <label for="product-image" class="block text-gray-700 font-medium mb-2">Product Image</label>
                        <input type="file" id="product-image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div id="product-image-preview" class="mt-4 "></div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save Changes</button>
                    </div>
                </form>
            </div>

            <div id="product-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://storage.googleapis.com/a1aa/image/fku3rRWmYPxZcqzaFeNisepcHMTJvNe71jF2ElJEVnh5WkVPB.jpg" alt="Image of a cement bag" class="w-full h-40 object-cover mb-4 rounded-lg">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Cement</h2>
                    <p class="text-gray-600 mb-4">High-quality cement for all your construction needs.</p>
                    <p class="text-gray-800 font-bold mb-2">$10.00</p>
                    <p class="text-gray-600 mb-4">Stock: 100</p>
                    <div class="flex justify-end space-x-2">
                        <button onclick="editProduct('Cement', 'High-quality cement for all your construction needs.', '10.00', 'cement', '100', 'https://storage.googleapis.com/a1aa/image/fku3rRWmYPxZcqzaFeNisepcHMTJvNe71jF2ElJEVnh5WkVPB.jpg', this.parentElement.parentElement)" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Edit</button>
                        <button onclick="deleteProduct(this.parentElement.parentElement)" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection