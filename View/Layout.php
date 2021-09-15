<?php
require_once $headerPath;
//require "View\Components\Footer.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/View/Style/CSS/Global.css">
    <script src="https://kit.fontawesome.com/bf0671b196.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- HEADER -->
    <?= $header; ?>
<!--  /HEADER -->

<!-- Page Content -->

<main class="container">
    <?= $contenu; ?>
</main>
<!-- /.container -->
<!-- FOOTER
 /FOOTER -->

</body>
</html>
