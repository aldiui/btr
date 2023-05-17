<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title;?></div>
                        <a href="<?= base_url();?>admin/transaction" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
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
                                <label for="amount"><strong>Customer</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : <?= $transaction['user'];?>
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
                                <label for="amount"><strong>Method</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : <?= $transaction['method'];?>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4">
                                <label for="amount"><strong>Amount</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : $ <?= $transaction['amount'];?> USD
                            </div>
                        </div>
                        <?php if($transaction['active'] == 4):?>
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4">
                                <label for="amount"><strong>Persentace</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : <?= $transaction['persentace'];?> %
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4">
                                <label for="amount"><strong>Profit</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : $ <?= $transaction['profit'];?> USD
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4">
                                <label for="amount"><strong>Total</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : $ <?=  $transaction['amount'] + $transaction['profit'];?> USD
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4">
                                <label for="amount"><strong>Time</strong></label>
                            </div>
                            <div class="col-lg-7 mb-4">
                                : <?php if ($transaction['active'] == 4): ?>
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
                                    class="badge light <?= ($transaction['active'] == 1) ? "badge-success" : (($transaction['active'] == 2) ? "badge-danger" : (($transaction['active'] == 4) ? "badge-info" : "badge-warning")); ?>">
                                    <?= ($transaction['active'] == 1) ? "Success" : (($transaction['active'] == 2) ? "Rejected" : (($transaction['active'] == 4) ? "Completed" : "Pending")); ?>
                                </span>
                            </div>
                        </div>
                        <?php if($transaction['active'] != 1 AND $transaction['active'] != 4):?>
                        <form action="" method="post" autocomplete="off">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="is_active"><strong>Status</strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($transaction['is_active'] == 1) ? "active" : "";?>"
                                                name="is_active" id="is_active1" autocomplete="off" value="1"
                                                <?= ($transaction['is_active'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="is_active1">Success</label>
                                            <input type="radio"
                                                class="btn-check <?= ($transaction['is_active'] == 2) ? "active" : "";?>"
                                                name="is_active" id="is_active3" autocomplete="off" value="2"
                                                <?= ($transaction['is_active'] == 2) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger" for="is_active3">Rejected</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <?php elseif($transaction['active'] == 1):?>
                        <form action="<?= base_url();?>admin/transaction/profit/<?= $transaction['id_trx'];?>"
                            method="post" autocomplete="off">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="amount" class="mb-1"><strong>Amount</strong></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control <?= !empty($error['amount']) ? 'is-invalid' : ''; ?>"
                                                name="amount" id="amount" value="<?= $transaction['amount'];?>"
                                                readonly><span class=" input-group-text">USD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="persentace" class="mb-1"><strong>Persentace</strong></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control <?= !empty($error['persentace']) ? 'is-invalid' : ''; ?>"
                                                name="persentace" id="persentace" max="100"
                                                value="<?= old('persentace');?>"><span
                                                class=" input-group-text">%</span>
                                        </div>
                                        <small class="small text-danger">
                                            <?= !empty($error['persentace']) ? validation_show_error('persentace') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="profit" class="mb-1"><strong>Profit</strong></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control <?= !empty($error['profit']) ? 'is-invalid' : ''; ?>"
                                                name="profit" id="profit" value="<?= old('profit');?>" readonly><span
                                                class=" input-group-text">USD</span>
                                        </div>
                                        <small class="small text-danger">
                                            <?= !empty($error['profit']) ? validation_show_error('profit') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <script>
                        function calculateProfit() {
                            const amount = parseFloat(document.getElementById('amount').value);
                            const percentage = parseFloat(document.getElementById('persentace').value);

                            if (isNaN(amount) || isNaN(percentage)) {
                                document.getElementById('profit').value = '';
                                return;
                            }
                            if (percentage > 100) {
                                document.getElementById('profit').value = '';
                                alert('Percentage cannot exceed 100.');
                                return;
                            }
                            const profit = amount * (percentage / 100);
                            document.getElementById('profit').value = profit.toFixed(2);
                        }
                        document.getElementById('persentace').addEventListener('input', calculateProfit);
                        </script>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>