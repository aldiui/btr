<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?= $title;?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url()?>assets/images/setting/<?= $setting['image'];?>" />
    <link href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100"><?= $this->renderSection('content') ?></div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
    <?php if(session()->getFlashdata('success')): ?>
    swal("Success", "<?= session()->getFlashdata('success');?>", "success");
    <?php elseif(!empty(session()->getFlashdata('error'))): ?>
    swal("Warning", "<?php echo session()->get('error'); ?>", "error");
    <?php endif; ?>
    </script>
</body>

</html>