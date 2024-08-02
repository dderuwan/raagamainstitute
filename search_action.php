<?php
  require_once 'search_config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT course_title FROM courses WHERE course_title LIKE :course';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['course' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['course_title'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>