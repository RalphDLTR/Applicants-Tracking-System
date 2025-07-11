<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "ireply";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $first_name = $conn->real_escape_string($_POST["first_name"]);
  $last_name = $conn->real_escape_string($_POST["last_name"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $phone = $conn->real_escape_string($_POST["phone"]);

  // Resume upload
  if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] === 0) {
    $fileTmp = $_FILES["resume"]["tmp_name"];
    $fileName = basename($_FILES["resume"]["name"]);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if ($fileExt !== "pdf") {
      die("Only PDF files are allowed.");
    }

    $uploadsDir = "uploads/";
    if (!is_dir($uploadsDir)) {
      mkdir($uploadsDir, 0777, true); // Create uploads directory if it doesn't exist
    }

    $newFileName = uniqid("resume_", true) . ".pdf";
    $fileDestination = $uploadsDir . $newFileName;

    if (move_uploaded_file($fileTmp, $fileDestination)) {
      // Insert into database
      $stmt = $conn->prepare("INSERT INTO applicants (first_name, last_name, email, phone, resume_path) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $fileDestination);

      if ($stmt->execute()) {
        // Redirect to thank you page
        header("Location: thank_you.php");
        exit();
      } else {
        echo "Database error: " . $stmt->error;
      }

      $stmt->close();
    } else {
      echo "Failed to upload resume.";
    }
  } else {
    echo "No resume uploaded or file error.";
  }
} else {
  echo "Invalid request.";
}

$conn->close();
?>

