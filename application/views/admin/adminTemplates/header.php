<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url('/assets/img/icons/favicon.ico'); ?>" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url('/assets/css/styleAdmin.css'); ?>">

    <title><?= $title; ?></title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark mb-10" style="background-color: #336699">
        <div class="container">
            <a class="navbar-brand page-scroll" href="<?= base_url(); ?>">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">Menu
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('adminProfile'); ?>">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('adminAbout'); ?>">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('adminPortfolio'); ?>">My Skills</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('adminContact'); ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout!</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>