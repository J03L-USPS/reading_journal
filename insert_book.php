<?php
// Database connection settings (you'll need to set these up)
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "library_database";


// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];

// Handle file upload (cover image)
$target_dir = "uploads/";  // Specify your upload directory
$target_file = $target_dir . basename($_FILES['cover_image']['name']);
move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file);

// Insert data into the "books" table
$sql = "INSERT INTO books (title, author, isbn, cover_image) VALUES ('$title', '$author', '$isbn', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "Book added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
