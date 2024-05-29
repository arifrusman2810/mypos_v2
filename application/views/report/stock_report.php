<html lang="en" moznomarginboxes mozdisallowselectionprint>
  <head>
    <title>laporan data stok barang</title>
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
            <center><h4>LAPORAN STOK BARANG</h4></center><br/>
          </td>
        </tr>                   
      </table>
      
      <table border="0" align="center" style="width:900px;border:none;">
        <tr>
          <th style="text-align:left"></th>
        </tr>
      </table>

      <table border="1" align="center" style="width:900px;margin-bottom:20px;">
      </table>

      
      <?php 
      foreach($categories as $category):
      ?>
        <table align='center' width='900px;' border='1'>
          <tr>
            <td colspan='2'><b>Kategori : <?= $category->name; ?></b></td>
            <td style="text-align:center;"><b>Total Stock: 10</b></td>
          </tr>
          <tr style='background-color:#ccc;'>
            <td width='4%' align='center'>No</td>
            <td width='30%' align='center'>Barcode</td>
            <td width='30%' align='center'>Nama Barang</td>
            <td width='30%' align='center'>Stok</td>
            <td width='30%' align='center'>Satuan</td>
          </tr>

          <?php 
            $no = 1;
            $this->db->select('p_item.*, p_unit.name as unit_name');
            $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
            $query = $this->db->get_where('p_item', array('category_id' => $category->category_id))->result(); 
            foreach ($query as $row){
          ?>
          <tr>
            <td style="text-align:center;vertical-align:top;text-align:center;"><?= $no++; ?></td>
            <td style="vertical-align:top;padding-left:5px;"><?= $row->barcode; ?></td>
            <td style="vertical-align:top;padding-left:5px;"><?= $row->name; ?></td>
            <td style="vertical-align:top;text-align:center;"><?= $row->stock; ?></td>  
            <td style="vertical-align:top;text-align:center;"><?= $row->unit_name; ?></td>  
          </tr>
          <?php } ?>

        </table>
        <div style="height: 20px;"></div>
      <?php endforeach; ?>



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