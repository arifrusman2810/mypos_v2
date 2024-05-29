<?php 
  $no = 1;
  if($carts->num_rows() > 0){
  foreach($carts->result() as $cart){ ?>
    <tr>
      <td><?= $no++; ?>.</td>
      <td><?= $cart->barcode; ?></td>
      <td><?= $cart->item_name; ?></td>
      <td class="text-right"><?= $cart->cart_price; ?></td>
      <td class="text-center"><?= $cart->qty; ?></td>
      <td class="text-right"><?= $cart->discount_item; ?></td>
      <td class="text-right" id="total"><?= $cart->total; ?></td>
      <td class="text-center" width="160px">
        <!-- <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
          data-cartid="<?= $cart->cart_id ?>"
          data-barcode="<?= $cart->barcode ?>"
          data-product="<?= $cart->item_name ?>"
          data-price="<?= $cart->price ?>"
          data-qty="<?= $cart->qty ?>"
          data-discount="<?= $cart->discount_item ?>"
          data-total="<?= $cart->total ?>"
          class="btn btn-xs btn-primary"
        >
          <i class="fa fa-pencil"></i> Update
        </button> -->
        <!-- <button type="button" id="del_cart" data-cartid="<?= $cart->cart_id ?>" class="btn btn-xs btn-danger">
        <i class="fa fa-trash"></i> Delete
        </button> -->
        <a href="<?= site_url('sale/cart_del/'.$cart->cart_id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
      </td>
    </tr>
  <?php }
  }
  else{ ?>
    <tr>
      <td colspan="8" class="text-center">Tidak ada item</td>
    </tr>
  <?php 
  }
?>