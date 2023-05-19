<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title;?></div>
                        <a href="<?= base_url();?>deposit" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>No Transaction</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $deposit['no_transaction'] ;?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Date</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= dated($deposit['created_at']);?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Amount</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $deposit['amount'];?> BUSD
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Method</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $deposit['method'];?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Hash ID</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $deposit['hash'];?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Payment Proof</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    <img src="<?= base_url();?>assets/images/transaction/<?= $deposit['image'];?>"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Status</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <span
                                        class="badge light <?= ($deposit['is_active'] == 1) ? "badge-success" : (($deposit['is_active'] == 2) ? "badge-danger" : "badge-warning"); ?>">
                                        <?= ($deposit['is_active'] == 1) ? "Success" : (($deposit['is_active'] == 2) ? "Rejected" : "Pending"); ?>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>