<section class="content-header">
  <h1>
    Items
    <small>Data Produk</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">items</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"> Barcode Generator <i class="fa fa-barcode"></i></h3>
      <div class="pull-right">
        <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>
    <div class="box-body">
      <img src="<?= base_url('assets/') ?>php_barcode/barcode.php?text=<?= $items->barcode ?>&print=true$size=65" width="200px">
      <div style="margin-left: 20px;">
        <?= $items->barcode; ?>
      </div>
      <div style="margin-left: 20px;">
        <a href="<?= site_url('item/barcode_print/'.$items->item_id); ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i> Print</a>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"> QR Generator <i class="fa fa-qrcode"></i></h3>
    </div>
    <div class="box-body">

      <?php 
      $qrCode = new Endroid\QrCode\QrCode($items->barcode);
      $qrCode->writeFile('uploads/qr-codes/item-'.$items->barcode.'.png');
      ?>

      <img src="<?= base_url('uploads/qr-codes/item-'.$items->barcode.'.png') ?>" alt="" width="200px">
      <div style="margin-left: 15px;">
        <?= $items->barcode; ?>
      </div>
      <div style="margin-left: 10px;">
        <a href="<?= site_url('item/qrcode_print/'.$items->item_id); ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-print"></i> Print</a>
      </div>

    </div>
  </div>
</section>