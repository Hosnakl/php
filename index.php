<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
include("header.php");
print <<<EOS
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<h1 class="text-center">Welcome to Algonquin Bank</h1>
<div class="text-center">
    Algonquin bank is Algonquin college student's loved bank.<br>
    We provide a set of tools for student to manage their finance.
<div><br><br>
<a href="Disclaimer.php">Deposite Calculator</a>
EOS;
include("Footer.php");

?>

