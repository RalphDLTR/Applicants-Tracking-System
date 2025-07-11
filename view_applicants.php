<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "ireply");

// Fetch applicants
$search = '';
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $result = $conn->query("SELECT * FROM applicants WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY submitted_at DESC");
} else {
    $result = $conn->query("SELECT * FROM applicants ORDER BY submitted_at DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Applicants</title>
  <link rel="stylesheet" href="style.css"> <!-- Uses your existing style -->
  <style>
    .admin-header {
      background-color: #1f253a;
      padding: 15px 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .admin-header img {
      height: 50px;
    }

    .admin-buttons {
      margin: 20px auto;
      display: flex;
      justify-content: center;
      gap: 30px;
    }

    .admin-buttons button {
      padding: 10px 25px;
      border-radius: 8px;
      background-color: #a0a0a0;
      border: none;
      font-weight: 500;
      cursor: pointer;
    }

    .applicants-container {
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table thead {
      background-color: #444;
      color: white;
    }

    table thead th {
      padding: 12px;
      text-align: left;
      font-size: 14px;
    }

    table tbody td {
      padding: 10px 12px;
      background-color: #e0e0e0;
      border-bottom: 1px solid #ccc;
    }

    .thead-id {
      background-color: #00b894 !important;
      color: white !important;
    }

  </style>
</head>
<body>

  <header class="admin-header">
    <img src="logo.png" alt="iReply Logo">
  </header>

  <div class="admin-buttons">
    <button>Administration</button>
    <button>Manage Users</button>
    <button>Settings</button>
  </div>

  <div class="applicants-container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
    <h2 style="margin: 0;">Applicants</h2>
    <form method="GET" action="view_applicants.php" style="display: inline-block;">
        <div style="position: relative; display: inline-flex; height: 36px;">
            <input type="text" name="search" placeholder="Search by name" value="<?= htmlspecialchars($search ?? '') ?>"
                   style="padding: 0 10px; height: 100%; border: 1px solid #ccc; border-radius: 4px; width: 200px; padding-right: 40px; font-size: 14px;">
            <button type="submit" 
                    style="position: absolute; right: 0; top: 0; height: 100%; width: 40px; background-color: #1f253a; color: white; border: none; border-radius: 0 4px 4px 0; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>
    </form>
    </div>

    <table>
      <thead>
        <tr>
          <th class="thead-id">ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Attachments</th>
          <th>Role</th>
          <th>Date & Time Applied</th> <!-- Added -->
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["first_name"] ?></td>
          <td><?= $row["last_name"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["phone"] ?></td>
          <td><a href="<?= $row["resume_path"] ?>" target="_blank">View Resume</a></td>
          <td>Applicant</td>
          <td><?= date("F j, Y - H:i", strtotime($row["submitted_at"])) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>

    </table>
  </div>

</body>
</html>

