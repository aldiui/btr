<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard" />
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title><?= $title;?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url()?>assets/images/setting/<?= $setting['image'];?>">
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/chartist/css/chartist.min.css">
    <link href="<?= base_url()?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/dropify/css/dropify.css" />
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">

        <div class="nav-header">
            <a href="<?= base_url();?>" class="brand-logo">
                <img src="<?= base_url()?>assets/images/setting/<?= $setting['image'];?>" width="50" alt=""
                    class="logo-abbr" />
                <div class="brand-title text-dark h3 text-center font-weight-bold pt-2 mx-auto"><?= $setting["short"];?>
                </div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="<?= base_url()?>assets/images/user/<?= $account['image'];?>" width="20"
                                        alt="" />
                                    <div class="header-info">
                                        <span><?= $account['username'];?></span>
                                        <small><?= $account['role'];?></small>
                                    </div>
                                </a>
                                <div class=" dropdown-menu dropdown-menu-end">
                                    <a href="<?= base_url()?>profile" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url()?>logout" class="dropdown-item ai-icon logout">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="sub-header">
                    <div class="d-flex align-items-center flex-wrap me-auto">
                        <h5 class="dashboard_bar"><?= $title;?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="main-profile mb-0 pb-0">
                    <div class="image-bx">
                        <img src="<?= base_url()?>assets/images/user/<?= $account['image'];?>" alt="">
                    </div>
                    <h5 class="name"><span class="font-w400">Hello,</span> <?= $account['username'];?></h5>
                    <p class=""><?= $account['email'];?></p>
                </div>
                <div class="mx-2 main-profile my-0 py-0">
                    <div class="card-bx stacked card mx-2 my-0">
                        <img src="<?= base_url()?>assets/images/card/card3.jpg" alt="">
                        <div class="card-info my-0">
                            <p class="mb-1 text-white text-center fs-14">Main Wallet</p>
                            <div class="text-center">
                                <h2 class="num-text text-white font-w600">$ <?= $account['main_wallet'];?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>dashboard" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>profile" aria-expanded="false">
                            <i class="flaticon-028-user-1"></i>
                            <span class="nav-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>wallet" aria-expanded="false">
                            <i class="flaticon-008-credit-card"></i>
                            <span class="nav-text">Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>plan" aria-expanded="false">
                            <i class="flaticon-001-monitor"></i>
                            <span class="nav-text">Privatesale Contribute</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>transaction" aria-expanded="false">
                            <i class="flaticon-089-piggy-bank"></i>
                            <span class="nav-text">Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>deposit" aria-expanded="false">
                            <i class="flaticon-043-plus"></i>
                            <span class="nav-text">Deposit</span>
                        </a>
                    </li>
                    <li>
                        <a class="ai-icon" href="<?= base_url();?>withdraw" aria-expanded="false">
                            <i class="flaticon-093-down-arrow-1"></i>
                            <span class="nav-text">Withdraw</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?= $this->renderSection('content') ?>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#">Teras Artha Kosher</a>
                    <?= date('Y');?>
                </p>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/dropify/js/dropify.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/js/plugins-init/datatables.init.js"></script>
    <script src="<?= base_url()?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/apexchart/apexchart.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url()?>assets/js/dashboard/dashboard-1.js"></script>
    <script src="<?= base_url()?>assets/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url()?>assets/js/custom.js"></script>
    <script src="<?= base_url()?>assets/js/deznav-init.js"></script>
    <script>
    <?php if(session()->getFlashdata('success')): ?>
    swal("Success", "<?= session()->getFlashdata('success');?>", "success");
    <?php elseif(!empty(session()->getFlashdata('error'))): ?>
    swal("Warning", "<?php echo session()->get('error'); ?>", "error");
    <?php endif; ?>
    </script>
</body>

</html>