<?php defined('BASEPATH') OR exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Giao dịch</div>
    <?php if($allTransactions): ?>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã giao dịch</th>
                    <th>Tổng số sản phẩm</th>
                    <th>Tổng giá trị</th>
                    <th>Tổng giá bán</th>
                    <th>Chênh lệch</th>
                    <th>Phương thức giao dịch</th>
                    <th>Nhân viên</th>
                    <th>Khách hàng</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allTransactions as $get): ?>
                <tr>
                    <th><?= $sn ?>.</th>
                    <td><a class="pointer vtr" title="Click to view receipt"><?= $get->ref ?></a></td>
                    <td><?= $get->quantity ?></td>
                    <td><?= number_format($get->totalMoneySpent, 2) ?> VNĐ</td>
                    <td><?= number_format($get->amountTendered, 2) ?> VNĐ</td>
                    <td><?= number_format($get->changeDue, 2) ?> VNĐ</td>
                    <td><?=  str_replace("_", " ", "Thanh toán tiền mặt")?></td>
                    <td><?=$get->staffName?></td>
                    <td><?=$get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td>
                    <td><?= date('d-m-y', strtotime($get->transDate)) ?></td>
                </tr>
                <?php $sn++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- table div end-->
    <?php else: ?>
        <ul><li>Không có giao dịch</li></ul>
    <?php endif; ?>
    
    <!--Pagination div-->
    <div class="col-sm-12 text-center">
        <ul class="pagination">
            <?= isset($links) ? $links : "" ?>
        </ul>
    </div>
</div>
<!-- panel end-->