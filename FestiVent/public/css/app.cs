/* Global Container */
.container {
    padding: 20px;
}

/* Card Styling */
.card {
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Button Styling */
.btn {
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-warning {
    background-color: #ffc107;
    color: #000;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

.btn:hover {
    opacity: 0.9;
}

/* Table Styling */
.table th {
    background-color: #007bff;
    color: #fff;
    text-align: center;
}

.table tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}

.table img {
    border-radius: 5px;
    object-fit: cover;
    max-height: 50px;
}

/* Heading Styling */
h2, h4 {
    font-family: 'Arial', sans-serif;
    font-weight: bold;
    color: #333;
}

/* Form Styling */
.form-control,
.form-select {
    border-radius: 5px;
    padding: 10px;
}

.form-group label {
    font-weight: bold;
    color: #555;
}

.community-image {
    object-fit: cover;
    height: 180px;
}

.card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}
