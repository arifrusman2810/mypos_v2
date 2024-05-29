<section class="content-header">
  <h1>
    categories
    <small>Kategori Produk</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">categories</li>
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
      <h3 class="box-title">Data Kategori</h3>
      <div class="pull-right">
        <a href="<?= site_url('category/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Create</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($categories->result() as $key => $category): ?>
          <tr>
            <td style="width: 5%;"><?= $no++; ?></td>
            <td><?= $category->name; ?></td>
            <td class="text-center" width="160px">
              <a href="<?= site_url('category/edit/'.$category->category_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <a href="<?= site_url('category/delete/'.$category->category_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>