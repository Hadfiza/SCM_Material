@extends('layouts.app')

@section('content')
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Admin Dashboard - Orders
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
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
   <main class="flex-1 overflow-y-auto p-6">
    <div class="max-w-7xl mx-auto">
     <h1 class="text-2xl font-semibold text-gray-900">
      Orders
     </h1>
     <div class="mt-6">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
       <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
         <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
           Order ID
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
           Customer
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
           Date
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
           Status
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
           Total
          </th>
          <th class="relative px-6 py-3" scope="col">
           <span class="sr-only">
            Edit
           </span>
          </th>
         </tr>
        </thead>
       </table>
      </div>
     </div>
    </div>
   </main>
  </div>
 </body>
</html>
@endsection