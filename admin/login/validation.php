<?php
if ($_POST) {
  $nickname = $_POST['nickname'];
  $password = $_POST['password'];

  if ($nickname == 'admin' && $password == 'admin') {
    header('Location: /quiz/admin/index.php?logged=0');
  } else {
    header('Location: index.php?error=0');
  }
}
