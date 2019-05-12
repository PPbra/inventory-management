<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12 text-center text-uppercase">
            <b>Cửa hàng Hương toản</b>
            <div>+0964241123</div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
            <b><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></b>
        </div>
    </div>
    
    <div class="row" style="margin-top:2px">
        <div class="col-sm-12">
            <label>Báo cáo số:</label>
            <span><?=isset($ref) ? $ref : ""?></span>
		</div>
    </div>
    
	<div class="row" style='font-weight:bold'>
		<div class="col-xs-4">Sản phẩm</div>
		<div class="col-xs-4">Số lượng x Đơn giá</div>
		<div class="col-xs-4">Tổng cộng (VNĐ)</div>
	</div>
	<hr style='margin-top:2px; margin-bottom:0px'>
    <?php $init_total = 0; ?>
    <?php foreach($allTransInfo as $get):?>
        <div class="row">
            <div class="col-xs-4"><?=ellipsize($get['itemName'], 10);?></div>
            <div class="col-xs-4"><?=$get['quantity'] . "x" .number_format($get['unitPrice'], 2)?></div>
            <div class="col-xs-4"><?=number_format($get['totalPrice'], 2)?></div>
        </div>
        <?php $init_total += $get['totalPrice'];?>
    <?php endforeach; ?>
    <hr style='margin-top:2px; margin-bottom:0px'>       
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Total: &#8358;<?=isset($init_total) ? number_format($init_total, 2) : 0?></b>
        </div>
    </div>
    <hr style='margin-top:2px; margin-bottom:0px'>      
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Discount(<?=$discountPercentage?>%): <?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?> VNĐ</b>
        </div>
    </div>       
    <div class="row">
        <div class="col-xs-12 text-right">
            <?php if($vatPercentage > 0): ?>
            <b>VAT(<?=$vatPercentage?>%): <?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?> VNĐ</b>
            <?php else: ?>
            VAT inclusive
            <?php endif; ?>
        </div>
    </div>      
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Tổng giá trị hàng bán: <?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?> VNĐ</b>
        </div>
    </div>
    <!-- <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Phương thức thanh toán: Tiền mặt</b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Giá trị bán ra: &#8358;<?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Chênh lệch: &#8358;<?=isset($changeDue) ? number_format($changeDue, 2) : ""?></b>
        </div>
    </div> -->
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Tên khách hàng: <?=$cust_name?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Số điện thoại khách hàng: <?=$cust_phone?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Email khách hàng: <?=$cust_email?></b>
        </div>
    </div>
    <br>
    <div class="row">
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary ptr">
                <i class="fa fa-print"></i> Print Receipt
            </button>
            
            <button type="button" data-dismiss='modal' class="btn btn-danger">
                <i class="fa fa-close"></i> Close
            </button>
        </div>
    </div>
</div>
<br class="hidden-print">
<?php endif;?>