<?php
session_start();
session_unset();
session_destroy();
header("Location: /M-V-C/controllers/inloggen.php");
exit;