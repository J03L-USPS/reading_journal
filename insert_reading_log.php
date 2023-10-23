<?php
// Database connection settings (modify these as needed)
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "library_database";  // Replace with your actual database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$date = $_POST['date'];
$time = $_POST['start_time'];
$time = $_POST['end_time'];
$book_title = $_POST['book_title'];
$start_page = $_POST['start_page'];
$stop_page = $_POST['stop_page'];
$pages_read = $_POST['pages_read'];

// Insert data into the "reading_log" table
$sql = "INSERT INTO reading_log (date, start_time, end_time, book_title, start_page, stop_page, pages_read) VALUES ('$date', '$time', '$book_title', '$start_page', '$stop_page', '$pages_read')";

if ($conn->query($sql) === TRUE) {
    echo "Reading log entry added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
