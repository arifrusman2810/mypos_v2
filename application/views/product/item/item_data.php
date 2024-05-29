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

  <?php if($this->session->has_userdata('message')){ ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i><?= $this->session->flashdata('message'); ?>
  </div>
  <?php } ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Product Items</h3>
      <div class="pull-right">
        <a href="<?= site_url('item/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Create Product Items</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Barcode</th>
            <th>Name</th>
            <th>Category</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($items->result() as $key => $item): ?>
          <tr>
            <td style="width: 5%;"><?= $no++; ?></td>
            <td>
              <?= $item->barcode; ?>
              <br>
              <a href="<?= site_url('item/barcode_qrcode/'.$item->item_id); ?>" class="btn btn-default btn-xs">Generate<i class="fa fa-barcode"></i></a>
            </td>
            <td><?= $item->name; ?></td>
            <td><?= $item->category_name; ?></td>
            <td><?= $item->unit_name; ?></td>
            <td><?= $item->price; ?></td>
            <td><?= $item->stock; ?></td>
            <td>
              <?php if($item->image != null){ ?>
                <img src="<?= base_url('uploads/products/'. $item->image); ?>" alt="" style="width: 100px;">
              <?php } ?>
            </td>
            <td class="text-center" width="160px">
              <a href="<?= site_url('item/edit/'.$item->item_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <a href="<?= site_url('item/delete/'.$item->item_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>


<script>
  $(document).ready(function(){
    $('#table1').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= site_url('item/get_ajax'); ?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [5, 6],
          "className": 'text-right'
        },
        {
          "targets": [7, -1],
          "className": 'text-center'
        },
        {
          "targets": [0, 7, -1],
          "orderable": false
        }
      ]
    });
  })
</script>