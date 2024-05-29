<section class="content-header">
  <h1>
    Reports
    <small>laporan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Reports</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Laporan</h3>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="20px">#</th>
            <th>Laporan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Laporan Stock Barang</td>
            <td>
              <a href="<?= site_url('report/stock_report')?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Print</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Laporan Penjualan</td>
            <td>
              <a href="<?= site_url('report/sale_report')?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Print</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</section>
