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

  <?php if($this->session->has_userdata('error')){ ?>
    <div class="alert alert-error alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-ban"></i><?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))); ?>
    </div>
  <?php } ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page); ?> item</h3>
      <div class="pull-right">
        <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <?= form_open_multipart('item/process'); ?>
            <div class="form-group">
              <label for="">Barcode *</label>
              <input type="hidden" name="item_id" value="<?= $row->item_id ?>">
              <input type="text" name="barcode" value="<?= $row->barcode ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Item Name *</label>
              <input type="text" name="name" value="<?= $row->name ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Category *</label>
              <select name="category" id="" class="form-control" required>
                <option value="">-- Pilih --</option>
                <?php foreach($categories as $category): ?>
                  <option value="<?= $category->category_id ?>" <?= $category->category_id == $row->category_id ? "selected" : null; ?>><?= $category->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Unit *</label>
              <?= form_dropdown('unit', $units, $selected_unit, ['class' => 'form-control', 'required']); ?>
            </div>
            <div class="form-group">
              <label for="">Price *</label>
              <input type="number" name="price" value="<?= $row->price ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <?php if($page == 'edit' && $row->image != null){ ?>
                <div style="margin-bottom: 6px;">
                  <img src="<?= base_url('uploads/products/'. $row->image); ?>" alt="" style="width: 80%;">
                </div>
              <?php } ?>
              <input type="file" name="image" class="form-control">
              <small style="color: salmon;"><i>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada'; ?>)</i></small>
            </div>
            <div class="form-group">
              <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>