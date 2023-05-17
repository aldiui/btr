<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <?php if($account['is_plan'] == 1 ):?>
            <?php
            $no = 1;
            foreach ($plan as $row) :?>
            <div class="col-lg-6">
                <div class="card card-coin">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="<?= base_url()?>assets/images/plan/<?= $row['image'];?>" width="100" alt="" />
                        </div>
                        <div class="text-center">
                            <h3><?= $row['name'];?></h3>
                            <small class="d-block mb-3">Period : <?= $row['period_month'];?> Month
                                (<?= $row['period_day'];?> Days)</small>
                            <div class="d-flex justify-content-between mb-2">
                                <div>Estimation Return</div>
                                <div>
                                    <?= $row['estimation'];?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div>Minimal Amount</div>
                                <div>
                                    $ <?= $row['min_amount'];?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div>Maximal Amount </div>
                                <div>
                                    $ <?= $row['max_amount'];?>
                                </div>
                            </div>
                            <div>
                                <a href="<?= base_url();?>transaction/<?= $row['id'];?>"
                                    class="btn btn-primary btn-block"> <i class="flaticon-092-money me-2"></i>Invest
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else:?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            We apologize, but you do not have access to Privatesale Contribute. Please kindly
                            ensure that
                            you have filled in your account wallet information first.</div>
                        <a href="<?= base_url();?>wallet" class="btn btn-primary">+ Add Wallet</a>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>