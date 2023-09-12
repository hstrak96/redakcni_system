<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
print_r($_SESSION);
?>
      <?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: Index.php");exit; 
?>
</body>
</html>