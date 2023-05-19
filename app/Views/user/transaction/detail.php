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
                        <a href="<?= base_url();?>transaction" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>No Transaction</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $transaction['no_transaction'] ;?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Date</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= dated($transaction['created_at']);?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Privatesale Contribute</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $transaction['plan'] ;?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Amount</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $transaction['amount'];?> BUSD
                                </div>
                            </div>
                            <?php if($transaction['is_active'] == 4):?>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Fixed</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $transaction['persentace'];?> X
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Profit</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?= $transaction['profit'];?> BUSD
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Total</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?=  $transaction['amount'] + $transaction['profit'];?> BUSD
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Time</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <?php if ($transaction['is_active'] == 4): ?>
                                    <span class="badge light badge-info">
                                        Completed
                                    </span>
                                    <?php else: ?>
                                    <?php if ($transaction['date'] != null): ?>
                                    <?php $take = days($transaction['created_at'], $transaction['day']); ?>
                                    <?= $take['date']; ?> (<?= $take['day']; ?> Days)
                                    <?php else: ?>
                                    <span class="badge light badge-warning">
                                        Pending
                                    </span>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Status</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    : <span
                                        class="badge light <?= ($transaction['is_active'] == 1) ? "badge-success" : (($transaction['is_active'] == 2) ? "badge-danger" : (($transaction['is_active'] == 4) ? "badge-info" : "badge-warning")); ?>">
                                        <?= ($transaction['is_active'] == 1) ? "Success" : (($transaction['is_active'] == 2) ? "Rejected" : (($transaction['is_active'] == 4) ? "Completed" : "Pending")); ?>
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