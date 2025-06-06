<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <nav>
            <!-- navigation sidebar -->
            <div><h2><a href=".">J</a></h2></div>
            <div<?= $current == 'about-me' ? ' class="current"' : '' ?>><a href="about-me">About Me</a></div>
            <div><a href=".#portfolio">My Portfolio</a></div>
            <div<?= $current == 'coding-examples' ? ' class="current"' : '' ?>><a href="coding-examples">Coding Examples</a></div>
            <div<?= $current == 'scs-scheme' ? ' class="current"' : '' ?>><a href="scs-scheme">SCS Scheme</a></div>
            <div class="contact-highlight"><a href=".#contact">Contact Me</a></div>
        </nav>