<section class="content-header">
  <h1>
    Stock Out
    <small>Produk keluar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Stock Out</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php if($this->session->has_userdata('message')){ ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="fa fa-check"></i> <?= $this->session->flashdata('message'); ?>
  </div>
  <?php } ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Stock Out</h3>
      <div class="pull-right">
        <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add Stock Out</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Barcode</th>
            <th>Product Item</th>
            <th>Qty</th>
            <th>Tanggal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach($stocks as $stock): ?>
          <tr>
            <td style="width: 5%;"><?= $no++; ?></td>
            <td><?= $stock->barcode; ?></td>
            <td><?= $stock->item_name; ?></td>
            <td class="text-right"><?= $stock->qty; ?></td>
            <td class="text-center"><?= indo_date($stock->date); ?></td>

            <td class="text-center" width="160px">
              <a id="set_detail" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                data-barcode="<?= $stock->barcode; ?>"
                data-itemname="<?= $stock->item_name; ?>"
                data-detail="<?= $stock->detail; ?>"
                data-suppliername="<?= $stock->supplier_name; ?>"
                data-qty="<?= $stock->qty; ?>"
                data-date="<?= indo_date($stock->date); ?>">
                <i class="fa fa-eye"></i> Detail
              </a>
              <a href="<?= site_url('stock/out/delete/'.$stock->stock_id. '/' .$stock->item_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-detail">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Stock-In Detail</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered no-margin table-responsive">
          <tbody>
            <tr>
              <th style="width: 35%">Barcode</th>
              <td><span id="barcode"></span></td>
            </tr>
            <tr>
              <th>Item Name</th>
              <td><span id="item_name"></span></td>
            </tr>
            <tr>
              <th>Detail</th>
              <td><span id="detail"></span></td>
            </tr>
            <!-- <tr>
              <th>Supplier</th>
              <td><span id="supplier_name"></span></td>
            </tr> -->
            <tr>
              <th>Qty</th>
              <td><span id="qty"></span></td>
            </tr>
            <tr>
              <th>Date</th>
              <td><span id="date"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $(document).on('click', '#set_detail', function(){
      var barcode = $(this).data('barcode');
      var itemname = $(this).data('itemname');
      var detail = $(this).data('detail');
      var suppliername = $(this).data('suppliername');
      var qty = $(this).data('qty');
      var date = $(this).data('date');
      $('#barcode').text(barcode);
      $('#item_name').text(itemname);
      $('#detail').text(detail);
      $('#supplier_name').text(suppliername);
      $('#qty').text(qty);
      $('#date').text(date);
    })
  })
</script>