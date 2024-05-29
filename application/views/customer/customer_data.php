<section class="content-header">
  <h1>
    customer
    <small>Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Customers</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Suppplier</h3>
      <div class="pull-right">
        <a href="<?= site_url('customer/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Create</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($customers->result() as $key => $customer): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $customer->name; ?></td>
            <td><?= $customer->gender == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td><?= $customer->phone; ?></td>
            <td><?= $customer->address; ?></td>
            <td class="text-center" width="160px">
              <a href="<?= site_url('customer/edit/'.$customer->customer_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <a href="<?= site_url('customer/delete/'.$customer->customer_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>