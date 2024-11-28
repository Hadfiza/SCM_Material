@extends('layouts.app')
@section('content')
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>Material</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="text-xl font-semibold text-gray-700">
                    <a class="text-gray-800 hover:text-gray-600" href="#">
                        Material
                    </a>
                </div>
                <div class="flex items-center">
                    <a class="text-gray-800 hover:text-gray-600 mx-4" href="#" onclick="showCart()">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <img alt="Image of a stylish modern chair in a well-decorated living room" class="w-full h-56 object-cover object-center" height="400" src="https://storage.googleapis.com/a1aa/image/J08QeRfwenJDBoe4qPZgnEkysZ70FBM9xCy3CPmY2C38ggVPB.jpg" width="600"/>
                    <div class="px-6 py-4">
                        <h1 class="text-xl font-semibold text-gray-800">Modern Chair</h1>
                        <p class="py-2 text-gray-700">A stylish modern chair for your living room.</p>
                        <div class="flex items-center justify-between mt-4">
                            <h1 class="text-gray-700 font-bold text-xl">$150</h1>
                            <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded" onclick="addToCart('Modern Chair', 150)">Add to Cart</button>
                        </div>
                        <button class="mt-4 px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded" onclick="showDetails('Modern Chair', 'A stylish modern chair for your living room.', 150, 10)">Show</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" id="modal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title"></h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="modal-description"></p>
                    <p class="text-sm text-gray-500 mt-2" id="modal-price"></p>
                    <p class="text-sm text-gray-500 mt-2" id="modal-stock"></p>
                </div>
                <div class="items-center px-4 py-3">
                    <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h -full w-full hidden" id="cart-modal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Shopping Cart</h3>
                <div class="mt-2 px-7 py-3">
                    <ul id="cart-items" class="text-sm text-gray-500"></ul>
                    <p class="text-sm text-gray-500 mt-2" id="cart-total"></p>
                </div>
                <div class="items-center px-4 py-3">
                    <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded" onclick="closeCart()">Close</button>
                    <button class="px-4 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded" onclick="showCartPage()">View Cart</button>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" id="cart-page">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-4xl shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Shopping Cart</h3>
                <div class="mt-2 px-7 py-3">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Item</th>
                                <th class="py-2">Price</th>
                                <th class="py-2">Quantity</th>
                                <th class="py-2">Total</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart-page-items"></tbody>
                    </table>
                    <p class="text-sm text-gray-500 mt-2" id="cart-page-total"></p>
                </div>
                <div class="items-center px-4 py-3">
                    <button class="px-4 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded" onclick="closeCartPage()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let cart = [];

        function addToCart(item, price) {
            const existingItem = cart.find(cartItem => cartItem.item === item);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ item, price, quantity: 1 });
            }
            alert(item + ' has been added to the cart.');
        }

        function removeFromCart(item) {
            const existingItem = cart.find(cartItem => cartItem.item === item);
            if (existingItem) {
                if (existingItem.quantity > 1) {
                    existingItem.quantity -= 1;
                } else {
                    cart = cart.filter(cartItem => cartItem.item !== item);
                }
            }
            showCartPage();
        }

        function showCart() {
            const cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = '';
            let total = 0;
            cart.forEach((cartItem) => {
                const li = document.createElement('li');
                li.innerText = `${cartItem.item} - $${cartItem.price} x ${cartItem.quantity}`;
                cartItems.appendChild(li);
                total += cartItem.price * cartItem.quantity;
            });
            document.getElementById('cart-total').innerText = 'Total: $' + total;
            document.getElementById('cart-modal').classList.remove('hidden');
        }

        function closeCart() {
            document.getElementById('cart-modal').classList.add('hidden');
        }

        function showCartPage() {
            const cartPageItems = document.getElementById('cart-page-items');
            cartPageItems.innerHTML = '';
            let total = 0;
            cart.forEach((cartItem) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="py-2">${cartItem.item}</td>
                    <td class="py-2">$${cartItem.price}</td>
                    <td class="py-2">${cartItem.quantity}</td>
                    <td class="py-2">$${cartItem.price * cartItem.quantity}</td>
                    <td class="py-2">
                        <button class="px-2 py-1 bg-red-500 text-white text-xs font-bold uppercase rounded" onclick="removeFromCart('${cartItem.item}')">Remove</button>
                    </td>
                `;
                cartPageItems.appendChild(tr);
                total += cartItem.price * cartItem.quantity;
            });
            document.getElementById('cart-page-total').innerText = 'Total: $' + total;
            document.getElementById('cart-page').classList.remove('hidden');
        }

        function closeCartPage() {
            document.getElementById('cart-page').classList.add('hidden');
        }

        function showDetails(title, description, price, stock) {
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-description').innerText = description;
            document.getElementById('modal-price').innerText = 'Price: $' + price;
            document.getElementById('modal-stock').innerText = 'Stock: ' + stock;
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
    </body>
    </html>
@endsection