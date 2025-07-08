<?php
require_once 'db.php';

$re = $con->query("SELECT id, fname, lname, age FROM users");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h3 class="mb-4 text-center">User List</h3>

    <?php if ($re && $re->num_rows > 0) : ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
          <thead class="table-primary">
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $re->fetch_assoc()) : ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['fname']; ?></td>
                <td><?= $row['lname']; ?></td>
                <td><?= $row['age']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else : ?>
      <div class="alert alert-warning text-center">No records found.</div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>