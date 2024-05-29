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
      <h3 class="box-title">Edit User</h3>
      <div class="pull-right">
        <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <form action="" method="post">
            <div class="form-group <?= form_error('name') ? 'has-error' : null; ?>">
              <label for="">Name *</label>
              <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
              <input type="text" name="name" value="<?= $this->input->post('name') ?? $user->name; ?>" class="form-control">
              <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
              <label for="">Username *</label>
              <input type="text" name="username" value="<?= $this->input->post('username') ?? $user->username; ?>" class="form-control">
              <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
              <label for="">Password</label> <small style="color: salmon;">(Biarkan kosong jika tidak diganti!)</small>
              <input type="password" value="<?= $this->input->post('password') ?>" name="password" class="form-control">
              <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('passconf') ? 'has-error' : null; ?>">
              <label for="">Password Confirmation</label>
              <input type="password" value="<?= $this->input->post('passconf') ?>" name="passconf" class="form-control">
              <?= form_error('passconf', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <label for="">Address *</label>
              <textarea name="address" id="" class="form-control"><?= $this->input->post('address') ?? $user->address; ?></textarea>
            </div>
            <div class="form-group <?= form_error('level') ? 'has-error' : null; ?>">
              <label for="">Level *</label>
              <select name="level" id="" value="<?= set_value('level'); ?>" class="form-control">
                <?php $level = $this->input->post('level') ? $this->input->post('level') : $user->level ?>
                <option value="1">Admin</option>
                <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir</option>
              </select>
              <?= form_error('level', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <button type="submit" name="save" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>