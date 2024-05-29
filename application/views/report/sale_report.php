<html lang="en" moznomarginboxes mozdisallowselectionprint>
  <head>
    <title>laporan data penjualan</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets')?> /css/laporan.css"/>
  </head>

  <body onload="window.print()">
    <div id="laporan">
      <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
        <!--<tr>
          <td><img src="<?php echo base_url().'assets/img/kop_surat.png'?>"/></td>
        </tr>-->
      </table>

      <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
        <tr>
          <td colspan="2" style="width:800px;padding-left:20px;">
            <center><h4>LAPORAN PENJUALAN BARANG</h4></center><br/>
          </td>
        </tr>                   
      </table>
      
      <table border="0" align="center" style="width:900px;border:none;">
        <tr>
          <th style="text-align:left"></th>
        </tr>
      </table>

      <table border="1" align="center" style="width:900px;margin-bottom:20px;">
        <thead>
          <tr>
            <th style="width:50px;">No</th>
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Total</th>
            <th>Diskon</th>
            <th>Grand Total</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          $no = 1;
          foreach($sale as $row):
          ?>
          <tr>
            <td style="text-align:center;"><?= $no++; ?></td>
            <td><?= $row->invoice; ?></td>
            <td><?= indo_date($row->date) ." ". substr($row->sale_created, 11, 5); ?></td>
            <td><?= $row->user_name; ?></td>
            <td style="text-align:right;">Rp. <?= number_format($row->total_price, '0', ',', '.'); ?>,-</td>
            <td style="text-align:right;">Rp. <?= number_format($row->discount, '0', ',', '.'); ?>,-</td>
            <td style="text-align:right;">Rp. <?= number_format($row->final_price, '0', ',', '.'); ?>,-</td>
          </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
          <tr>
            <td colspan="6" style="text-align:center"><b>Total</b></td>
            <td style="text-align:right;"><b>Rp. <?= number_format($grandtotal, '0', ',', '.'); ?>,-</b></td>
          </tr>
        </tfoot>
      </table>

      <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
          <td></td>
        </tr>
      </table>

      <table align="center" style="width:800px; border:none; margin-top:5px; margin-bottom:20px;">
        <tr>
          <td align="right">Jakarta, <?php echo date('d-M-Y')?></td>
        </tr>
        <tr>
          <td align="right"></td>
        </tr>
        <tr>
          <td><br/><br/><br/><br/></td>
        </tr>    
        <tr>
          <td align="right">( <?= $this->fungsi->user_login()->name; ?> )</td>
        </tr>
        <tr>
          <td align="center"></td>
        </tr>
      </table>

      <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
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