<?php
session_start();
unset($_SESSION['cart']);
require_once __DIR__ . '/../views/bedankt.php';