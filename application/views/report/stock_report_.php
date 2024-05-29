<section class="content-header">
  <h1>
    Stock Report
    <small>Laporan Stock</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li><a href="#">Reports</a></li>
    <li class="active">Stock</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Stock</h3>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5px">#</th>
            <th>Tanggal</th>
            <th>Tipe</th>
            <th>Detail</th>
            <th>Qty</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
					$no = 1;
          foreach($stocks as $stock): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= indo_date($stock->date) ." ". substr($stock->created, 11, 5); ?></td>
            <td>Stock <?= $stock->type; ?></td>
            <td><?= $stock->detail; ?></td>
            <td><?= $stock->qty; ?></td>
            <td class="text-center">
							<button 
								id="detail" 
								data-target="#modal-detail" 
								data-toggle="modal" 
								class="btn btn-default btn-xs"
							>
								<i class="fa fa-eye"></i> Detail
							</button>
              
              <a href="<?= site_url('stock/print/'.$stock->stock_id); ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Print</a>
              <a href="<?= site_url('stock/delete/'.$stock->stock_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</section>

<!-- Modal -->
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Stock Report Detail</h4>
			</div>
			<div class="modal-body">
			  <div class="row">
					<div class="col-md-6">
						<table class="table table-borderless">
							<tr>
								<th>Invoice</th>
								<td><?= $sale->invoice; ?></td>
							</tr>
							<tr>
								<th>Date Time</th>
								<td><?= indo_date($sale->date)." ". substr($sale->sale_created, 11, 5); ?></td>
							</tr>
							<tr>
								<th>Total</th>
								<td><?= indo_currency($sale->total_price); ?></td>
							</tr>
							<tr>
								<th>Discount</th>
								<td><?= indo_currency($sale->discount); ?></td>
							</tr>
							<tr>
								<th>Grand Total</th>
								<td><?= indo_currency($sale->final_price); ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-borderless">
							<tr>
								<th>Customer</th>
								<td><?= $sale->customer_name; ?></td>
							</tr>
							<tr>
								<th>Chashier</th>
								<td><?= ucfirst($sale->user_name) ?></td>
							</tr>
							<tr>
								<th>Cash</th>
								<td><?= indo_currency($sale->cash) ?></td>
							</tr>
							<tr>
								<th>Change</th>
								<td><?= indo_currency($sale->remaining) ?></td>
							</tr>
							<tr>
								<th>Note</th>
								<td><?= $sale->note; ?></td>
							</tr>
						</table>

					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th>Produck Item</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Disc</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td><?= indo_currency($sale->total_price); ?></td>
								<td></td>
								<td><?= $sale->discount; ?></td>
								<td><?= $sale->final_price; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>