<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Payment Management</title> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
        }
        .navbar-nav .nav-item.active .nav-link,
        .navbar-nav .nav-item .nav-link.active {
            color: #fff !important;
            background-color: #ffcc00;
            border-radius: 5px;
        }
        .table-container {
            margin-top: 20px;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .form-container h2 {
            margin-bottom: 15px;
        }
        .addpayment{
            align-item : center;
        }
    </style>
</head>
<body>
    <?php

        require_once('include/header.php');
        require_once('include/menu.php');
    ?>

<div class="container">
    <!-- Search Payment -->
    
    <!-- Payment Table -->
    <div class="table-container">
        <h2>Payment Details</h2>
        <div class="form-container">
                <form id="searchForm" class="d-flex">
                <input type="text" class="form-control me-2" id="searchPaymentId" placeholder="Search payment using payment ID">
                <button id="searchButton" class="btn btn-secondary">Search</button>
            </form>
        </div>
        <a href="add_payment.html" class="btn btn-primary mb-3 addpayment">Add Payment</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Detail</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="paymentTableBody">
                <!-- Data will be inserted here dynamically -->
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Simulated data
        const payments = [
            { id: 'P001', date: '2024-08-01', amount: 1500, detail: 'Payment for July' },
            { id: 'P002', date: '2024-08-05', amount: 2000, detail: 'Payment for August' },
            { id: 'P003', date: '2024-08-10', amount: 1700, detail: 'Payment for September' },
        ];

        const paymentTableBody = document.getElementById('paymentTableBody');
        const searchButton = document.getElementById('searchButton');
        const searchPaymentId = document.getElementById('searchPaymentId');

        function updateTable(data) {
            paymentTableBody.innerHTML = data.map(payment => `
                <tr>
                    <td>${payment.id}</td>
                    <td>${payment.date}</td>
                    <td>${payment.amount}</td>
                    <td>${payment.detail}</td>
                    <td>
                        <a href="edit_payment.html?id=${payment.id}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-button" data-id="${payment.id}">Delete</button>
                    </td>
                </tr>
            `).join('');
        }

        function findPaymentById(id) {
            return payments.find(payment => payment.id === id);
        }

        searchButton.addEventListener('click', (event) => {
            event.preventDefault();
            const searchId = searchPaymentId.value;
            const filteredPayments = payments.filter(payment => payment.id.includes(searchId));
            updateTable(filteredPayments);
        });

        paymentTableBody.addEventListener('click', (event) => {
            if (event.target.classList.contains('delete-button')) {
                const id = event.target.dataset.id;
                const index = payments.findIndex(payment => payment.id === id);
                if (index > -1) {
                    payments.splice(index, 1);
                    updateTable(payments);
                }
            }
        });

        updateTable(payments); // Initial load
    });
</script>
<?php
    require_once('include/footer.php');
?>

</body>
</html>
