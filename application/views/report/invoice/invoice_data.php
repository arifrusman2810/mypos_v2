<section class="content-header">
  <h1>
    Sales Report
    <small>Laporan Penjualan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li><a href="#">Reports</a></li>
    <li class="active">Sales</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Penjualan</h3>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5px">#</th>
            <th>Invoice</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Grand Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
					$no = 1;
          // $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
          foreach($sales as $sale): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $sale->invoice; ?></td>
            <td><?= $sale->date; ?></td>
            <td><?= $sale->customer_name; ?></td>
            <td><?= $sale->total_price; ?></td>
            <td><?= $sale->discount; ?></td>
            <td><?= $sale->final_price; ?></td>
            <td class="text-center">
							<!-- <button 
								id="detail" 
								data-target="#modal-detail" 
								data-toggle="modal" 
								class="btn btn-default btn-xs" 
								value="<?= $sale->sale_id; ?>"
							>
								<i class="fa fa-eye"></i> Detail
							</button> -->
							<a class="btn btn-xs btn-default" href="#modal-detail<?= $sale->sale_id?>" data-toggle="modal" title="Detail"><i class="fa fa-eye"></i> Detail</a>
              
              <a href="<?= site_url('invoice/print/'.$sale->sale_id); ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Print</a>
              <a href="<?= site_url('invoice/delete/'.$sale->sale_id); ?>" onclick="return confirm('Yakin mau menghapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
				<?= $pagination; ?>
      </ul>
    </div> -->
  </div>

</section>

<!-- Modal -->
<?php 
foreach($sales as $sale):
?>
<div class="modal fade" id="modal-detail<?= $sale->sale_id?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Sales Report Detail</h4>
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
								<th>Sub Total</th>
								<td><?= indo_currency($sale->total_price); ?></td>
							</tr>
							<tr>
								<th>Additional Disc</th>
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
              <?php 

              $this->db->select('t_sale_detail.*, p_item.name as item_name');
              $this->db->from('t_sale_detail');
              $this->db->join('p_item', 'p_item.item_id = t_sale_detail.item_id');
              $query = $this->db->where('sale_id', $sale->sale_id)->get()->result();
              foreach($query as $row):
              ?>

							<tr>
								<td><?= $row->item_name; ?></td>
								<td><?= indo_currency($row->price); ?></td>
								<td><?= $row->qty; ?></td>
								<td><?= $row->discount_item; ?></td>
								<td><?= $row->total; ?></td>
							</tr>

              <?php endforeach; ?>

						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endforeach; ?>