<section class="content-header">
  <h1>
    Users
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Users</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Users</h3>
      <div class="pull-right">
        <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i> Create</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Name</th>
            <th>Address</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($users->result() as $key => $user): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $user->username; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->address; ?></td>
            <td><?= $user->level == 1 ? "Admin" : "Kasir"; ?></td>
            <td class="text-center" width="160px">
              <?php 
              if($user->level == 1){ ?>
                <a href="#" class="btn btn-primary btn-xs" disabled><i class="fa fa-pencil"></i> Update</a>
              <?php }
              else{ ?>
              <a href="<?= site_url('user/edit/'.$user->user_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
              <form action="<?= site_url('user/delete') ?>" method="post" style="float:right">
                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                <button onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
              </form>
              <?php } ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>