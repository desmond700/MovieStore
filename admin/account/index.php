<?php



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
      $action = 'login';
      if (isset($_SESSION['user'])) {
          $action = 'view';
      }
  }
}

switch ($action) {
    case 'registration':
        include("registration.php");
        break;
    case 'login':
        include("login.php");
        break;
    case 'view':
        include("view.php");
        break;
    case 'edit':
        include("edit.php");
        break;
    case 'logout':
       unset($_SESSION['user']);
       redirect('..');
       break;
   default:
       display_error("Unknown account action: " . $action);
       break;
 }

?>
