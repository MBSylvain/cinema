<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to the homepage
header('Location: ../index.php');
exit();
