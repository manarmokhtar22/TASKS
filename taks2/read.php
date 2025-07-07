<?php

require_once 'db.php';

$username=$_POST['username'];

$sql=$con->prepare("select * from users where username=?");
$sql->bind_param("s",$username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Result</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if($sql->execute()){
    $rows = $sql->get_result();
      if ($rows->num_rows> 0) {
         echo '<table class="table table-bordered table-striped w-75 mx-auto text-center">';
        echo '<thead class="table-dark"><tr><th>ID</th><th>Username</th><th>Age</th></tr></thead><tbody>';

        while ($result = $rows->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($result['id']) . '</td>';
            echo '<td>' . htmlspecialchars($result['username']) . '</td>';
            echo '<td>' . htmlspecialchars($result['age']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';

    } else {
        echo "No user found with that username";
    }
}else{
    echo "Error Not deleted Because : ".$sql->error;
}
?>
</div>
</body>
</html>