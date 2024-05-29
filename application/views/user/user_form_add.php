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
      <h3 class="box-title">Add User</h3>
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
              <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control">
              <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
              <label for="">Username *</label>
              <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control">
              <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('password') ? 'has-error' : null; ?>">
              <label for="">Password *</label>
              <input type="password" name="password" class="form-control">
              <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group <?= form_error('passconf') ? 'has-error' : null; ?>">
              <label for="">Password Confirmation *</label>
              <input type="password" name="passconf" class="form-control">
              <?= form_error('passconf', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <label for="">Address *</label>
              <textarea name="address" id="" class="form-control"><?= set_value('address'); ?></textarea>
            </div>
            <div class="form-group <?= form_error('level') ? 'has-error' : null; ?>">
              <label for="">Level *</label>
              <select name="level" id="" value="<?= set_value('level'); ?>" class="form-control">
                <option value="">--Pilih--</option>
                <option value="1" <?= set_value('level') == 1 ? "selected" : null; ?>>Admin</option>
                <option value="2" <?= set_value('level') == 2 ? "selected" : null; ?>>Kasir</option>
              </select>
              <?= form_error('level', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>