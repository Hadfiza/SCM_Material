@extends('layouts.app')

@section('title', 'Supplier')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
@endsection

@section('navbar-item')
  <nav class="tabs">
    <div id="tab-suppliers" class="active">Suppliers</div>
    <div id="tab-kontrak">Kontrak</div>
  </nav>
@endsection

@section('content')
    <main class="content">
        <section class="main-content">
            <div id="content-suppliers" class="content-section active">
                <div class="container">
                    <div class="search-bar-container">
                        <div class="search-bar">
                            <input type="text" placeholder="Search supplier">
                            <i class="fas fa-filter filter-icon"></i>
                        </div>
                        <button class="add-supplier" aria-label="Add Supplier">+ Add Supplier</button>
                    </div>
                </div>
                <form class="add-supplier-form" style="display: none;">
                    <div class="form-group">
                        <label for="supplier-name">Supplier Name</label>
                        <input type="text" id="supplier-name" placeholder="Supplier Name" required />
                    </div>
                    <div class="form-group">
                        <label for="supplier-address">Alamat</label>
                        <input type="text" id="supplier-address" placeholder="JL." required />
                    </div>
                    <div class="form-group">
                        <label for="supplier-contact">Kontak</label>
                        <input type="text" id="supplier-contact" placeholder="+62" required />
                    </div>
                    <button type="submit" class="form-submit">Submit</button>
                </form>
                <div class="supplier-list">
                    <!-- Supplier cards will be dynamically added here -->
                </div>
                <div class="pagination"></div>
            </div>
            <div id="content-kontrak" class="content-section">
                <div class="iframe-container">
                    <iframe src="kontrak.pdf" frameborder="0" width="100%" height="100%"></iframe>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll('.tabs div');
            const contentSections = document.querySelectorAll('.content-section');
            const addSupplierButton = document.querySelector('.add-supplier');
            const addSupplierForm = document.querySelector('.add-supplier-form');
            const supplierList = document.querySelector('.supplier-list');
            const iframeContainer = document.querySelector('.iframe-container');

            // Function to switch tabs
            function switchTab(selectedTab) {
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                    const contentId = `content-${tab.id.split('-')[1]}`;
                    const contentSection = document.getElementById(contentId);
                    contentSection.classList.remove('active');
                });

                selectedTab.classList.add('active');
                const selectedContentId = `content-${selectedTab.id.split('-')[1]}`;
                const selectedContentSection = document.getElementById(selectedContentId);
                selectedContentSection.classList.add('active');
            }

            // Event listeners for tab clicks
            tabs.forEach(tab => {
                tab.addEventListener('click', () => switchTab(tab));
            });

            // Event listener for add supplier button
            addSupplierButton.addEventListener('click', () => {
                addSupplierForm.style.display = addSupplierForm.style.display === 'none' ? 'block' : 'none';
            });

            // Form submission handling
            addSupplierForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const supplierName = document.getElementById('supplier-name').value;
                const supplierAddress = document.getElementById('supplier-address').value;
                const supplierContact = document.getElementById('supplier-contact').value;

                // Create supplier card
                const supplierCard = document.createElement('div');
                supplierCard.classList.add('supplier-card');
                supplierCard.innerHTML = `<h3>${supplierName}</h3><p>${supplierAddress}</p><p>${supplierContact}</p>`;
                supplierList.appendChild(supplierCard);

                // Reset form
                addSupplierForm.reset();
                addSupplierForm.style.display = 'none';
            });
        });
    </script>

    <style>
    .body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #F5F7FA;
    }

    .content {
        margin-left: 0px;
        padding: 0; /* Menghilangkan padding */
    }

    .main-content {
        margin-top: 0; /* Menghilangkan margin atas */
        padding: 0; /* Menghilangkan padding */
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tabs {
        display: flex;
        border-bottom: 1px solid #E0E0E0;
        margin: 0; /* Menghilangkan margin */
    }

    .tabs div {
        padding: 10px 20px;
        cursor: pointer;
    }

    .tabs div.active {
        border-bottom: 2px solid #004D40;
        font-weight: 500;
    }

    .action-bar {
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 10px;
        margin: 0; /* Menghilangkan margin */
        width: 100%;
    }

    .search-bar {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0; /* Menghilangkan margin */
    }

    .search-bar input {
        border: none;
        border-bottom: 1px solid #f1e7e7;
        padding: 10px;
        font-size: 16px;
        color: #101011;
        outline: none;
        width: 400px;
        border-radius: 20px;
        transition: width 0.4s ease-in-out;
        text-align: center;
    }

    .search-bar input:focus {
        width: 500px;
    }

    .search-bar .filter-icon {
        margin-left: 10px;
        color: #5f6368;
    }

    .filter-btn {
        background-color: #00796B;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
        background: none;
        border: none;
        cursor: pointer;
        color: #3f51b5;
        font-size: 20px;
        margin-left: 10px;
    }

    .add-supplier {
        background-color: #004D40;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .add-supplier-form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .add-supplier-form .form-group {
        margin-bottom: 15px;
    }

    .add-supplier-form label {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .add-supplier-form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #E0E0E0;
        border-radius: 4px;
    }

    .add-supplier-form .form-submit {
        background-color: #004D40;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .supplier-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .supplier-card {
        flex: 1 1 calc(33.333% - 20px);
        border: 1px solid #E0E0E0;
        border-radius: 20px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .supplier-card:hover {
        transform: translateY(-5px);
    }

    .supplier-card h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 500;
    }

    .supplier-card p {
        margin: 10px 0;
        font-size: 14px;
        color: #757575;
    }

    .supplier-card .tags {
        display: flex;
        flex-wrap: wrap;
    }

    .supplier-card .tags span {
        background-color: #E0F2F1;
        color: #004D40;
        padding: 5px 10px;
        border-radius: 4px;
        margin-right: 10px;
        margin-bottom: 10px;
        font-size: 12px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination button {
        border: none;
        background-color: #004D40;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin: 0 5px;
    }

    .pagination button:disabled {
        background-color: #9E9E9E;
        cursor: not-allowed;
    }

    </style>
    @endsection
