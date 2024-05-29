<section class="content-header">
  <h1>
    Stock Out
    <small>Produk Keluar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Stock Out</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php if($this->session->has_userdata('message')){ ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-ban"></i><?= $this->session->flashdata('message'); ?>
    </div>
  <?php } ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Add Stock Out</h3>
      <div class="pull-right">
        <a href="<?= site_url('stock/out') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form action="<?= site_url('stock/process_out') ?>" method="post">
            <div class="form-group">
              <label for="">Date *</label>
              <input type="hidden" name="stock_id" value="">
              <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <div>
              <label for="barcode">Barcode *</label>
            </div>
            <div class="form-group input-group">
              <input type="hidden" name="item_id" value="" id="item_id">
              <input type="text" name="barcode" id="barcode" value="" class="form-control" required autofocus>
              <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            <div class="form-group">
              <label for="">Item Name *</label>
              <input type="text" name="item_name" id="item_name" class="form-control" readonly>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="unit_name">Item Unit</label>
                  <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label for="stock">Initial Stock</label>
                  <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Detail *</label>
              <input type="text" name="detail" id="detail" class="form-control" placeholder="Rusak / hilang / kadaluarsa / ect" required>
            </div>
            <div class="form-group">
              <label for="">Qty *</label>
              <input type="number" name="qty" id="qty" class="form-control" required>
            </div>

            <div class="form-group">
              <button type="submit" name="out_add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>

<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Select Product Item</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Name</th>
              <th>Unit</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($items as $item): ?>
            <tr>
              <td><?= $item->barcode; ?></td>
              <td><?= $item->name; ?></td>
              <td><?= $item->unit_name; ?></td>
              <td class="text-right"><?= indo_currency($item->price); ?></td>
              <td class="text-right"><?= $item->stock; ?></td>
              <td class="text-right">
                <button class="btn btn-info" id="select" 
                data-id="<?= $item->item_id; ?>"
                data-barcode="<?= $item->barcode; ?>"
                data-name="<?= $item->name; ?>"
                data-unit="<?= $item->unit_name; ?>"
                data-stock="<?= $item->stock; ?>">
                  <i class="fa fa-check"> Select</i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    $(document).on('click', '#select', function(){
      var item_id = $(this).data('id');
      var barcode = $(this).data('barcode');
      var name = $(this).data('name');
      var unit_name = $(this).data('unit');
      var stock = $(this).data('stock');
      $('#item_id').val(item_id);
      $('#barcode').val(barcode);
      $('#item_name').val(name);
      $('#unit_name').val(unit_name);
      $('#stock').val(stock);
      $('#modal-item').modal('hide');
    })
  })
</script>