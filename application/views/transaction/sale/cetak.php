<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Invoice Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
  <div id="laporan">
    <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
      <!--<tr>
        <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
      </tr>-->
    </table>

    <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
      <tr></tr>                   
    </table>

    <?php 
      // $b=$data->row_array();
    ?>
    <table border="0" align="center" style="width:700px;border:none;">
      <tr>
        <th style="text-align:left;">No Invoice</th>
        <th style="text-align:left;">: <?= $sale['invoice']; ?></th>
        <th style="text-align:left;">Total</th>
        <th style="text-align:left;">: Rp. <?= number_format($sale['final_price'], '0', ',', '.'); ?>,-</th>
      </tr>
      <tr>
        <th style="text-align:left;">Date</th>
        <th style="text-align:left;">: <?= indo_date($sale['date']) ." ". substr($sale['sale_created'], 11, 5); ?></th>
        <th style="text-align:left;">Cash</th>
        <th style="text-align:left;">: Rp. <?= number_format($sale['cash'], '0', ',', '.'); ?>,-</th>
      </tr>
      <tr>
        <th style="text-align:left;">Note</th>
        <th style="text-align:left;">: <?= $sale['note']; ?></th>
        <th style="text-align:left;">Remaining</th>
        <th style="text-align:left;">: Rp <?= number_format($sale['remaining'], '0', ',', '.'); ?>,-</th>
      </tr>
    </table>

    <table border="1" align="center" style="width:700px;margin-bottom:20px;">
      <thead>
        <tr>
          <th style="width:50px;">No</th>
          <th>Nama Barang</th>
          <th>Harga Jual</th>
          <th>Qty</th>
          <th>Diskon</th>
          <th>SubTotal</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $this->db->select('t_sale_detail.*, p_item.name as item_name');
        $this->db->from('t_sale_detail');
        $this->db->join('p_item', 'p_item.item_id = t_sale_detail.item_id');
        $query = $this->db->where('sale_id', $sale['sale_id'])->get()->result();
        foreach($query as $row):
        ?>
        <tr>
          <td style="text-align:center;"><?= $no++; ?></td>
          <td style="text-align:left;"><?= $row->item_name; ?></td>
          <td style="text-align:center;">Rp. <?= number_format($row->price, '0', ',', '.'); ?>,-</td>
          <td style="text-align:center;"><?= $row->qty; ?></td>
          <td style="text-align:center;">Rp. <?= number_format($row->discount_item, '0', ',', '.'); ?>,-</td>
          <td style="text-align:right;">Rp. <?= number_format($row->total, '0', ',', '.'); ?>,-</td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="5" style="text-align:right;"><b>Total</b></td>
          <td style="text-align:right;"><b>Rp. <?= number_format($total_price, '0', ',', '.'); ?>,-</b></td>
        </tr>
        <tr>
          <td colspan="5" style="text-align:right;"><b>Additianal Discount</b></td>
          <td style="text-align:right;"><b>Rp. <?= number_format($sale['discount'], '0', ',', '.'); ?>,-</b></td>
        </tr>
      </tbody>

      <tfoot>
        <tr>
          <td colspan="5" style="text-align:right;"><b>Grand Total</b></td>
          <td style="text-align:right;"><b>Rp. <?= number_format($sale['final_price'], '0', ',', '.'); ?>,-</b></td>
        </tr>
      </tfoot>
    </table>

    <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
      <tr>
        <td></td>
      </tr>
    </table>

    <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
      <tr>
        <td align="right">Jakarta, <?= indo_date($sale['date']); ?></td>
      </tr>
      <tr>
        <td align="right"></td>
      </tr>
      <tr>
        <td><br/><br/><br/><br/></td>
      </tr>    
      <tr>
        <td align="right">( <?= $sale['user_name']; ?> )</td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
    </table>

    <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
      <tr>
        <th><br/><br/></th>
      </tr>
      <tr>
        <th align="left"></th>
      </tr>
    </table>

  </div>
</body>
</html>