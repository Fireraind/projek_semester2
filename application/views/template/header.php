<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/projek_style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body class="sb-nav-fixed">
    <nav class=" sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar merk-->
        <a class="navbar-brand ps-5" href="<?= base_url('home') ?>"> <i class="fab fa-jedi-order"></i> XERAPHONE</a>
        <!-- Sidebar Toggle (garis 3 menggunakan javascript)-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0  " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="row mt-0">

            </div>
            <!-- end -->

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="width:40px; height: 40px;" class="rounded-pill"></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>setting"><i class="fa-solid fa-gear"></i> Settings</a></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark id=" sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Administrator</div>
                        <a class="nav-link" href="<?= base_url() ?>home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('datauser') ?>"><i class="fa-regular fa-user"></i>User Data</a>
                                <a class="nav-link" href="<?= base_url('dataproduct') ?>"><i class="fas fa-poll-h"></i>Product Data</a>
                                <a class="nav-link" href="<?= base_url('invoice') ?>"><i class="fa-regular fa-pen-to-square"></i>Invoice Data</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">User Interface</div>
                        <a class="nav-link" href="<?= base_url('shop') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                            Shop Now
                        </a>
                        <a class="nav-link" href="<?= base_url('') ?>setting">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Setting
                        </a>




                    </div>


                    <div class="sb-sidenav-footer position-absolute bottom-0 " style="width:224px;">
                        <div class="small ">Logged in as:</div>
                        <?= $user['name']; ?>
                    </div>
                </div>
            </nav>
        </div>