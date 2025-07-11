<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iReply - Applicant Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="logo.png" alt="iReply Logo" class="logo">
    <nav class="nav-links">
      <a href="#">Heading</a>
      <a href="#">Heading</a>
      <a href="#">Heading</a>
      <a href="#">Heading</a>
    </nav>
  </header>

  <div class="form-container">
    <h2>Applicant Registration</h2>
    <form action="submit.php" method="POST" enctype="multipart/form-data">
      <label>First Name</label>
      <input type="text" name="first_name" required>

      <label>Last Name</label>
      <input type="text" name="last_name" required>

      <label>Email Address</label>
      <input type="email" name="email" required>

      <label>Phone Number</label>
      <input type="text" name="phone" required>

      <label for="resume">Upload Resume (PDF)</label>
      <div class="custom-file-upload">
        <label for="resume" class="upload-btn">Add File</label>
        <span id="file-name">No file chosen</span>
        <button type="button" id="remove-file" class="remove-btn" style="display:none;">Remove</button>
        <input type="file" id="resume" name="resume" accept="application/pdf" required>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>

<script>
  const fileInput = document.getElementById('resume');
  const fileNameDisplay = document.getElementById('file-name');
  const removeBtn = document.getElementById('remove-file');

  fileInput.addEventListener('change', function () {
    if (this.files.length > 0) {
      fileNameDisplay.textContent = this.files[0].name;
      removeBtn.style.display = 'inline';
    } else {
      fileNameDisplay.textContent = 'No file chosen';
      removeBtn.style.display = 'none';
    }
  });

  removeBtn.addEventListener('click', function () {
    fileInput.value = '';
    fileNameDisplay.textContent = 'No file chosen';
    removeBtn.style.display = 'none';
  });
</script>

</html>

