<section class="content-header">
  <h1>
    Sales
    <small>Penjualan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Sales</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-4">  
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top;">
                <label for="date">Date</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="date" id="date" value="<?= date('Y-m-d'); ?>" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="user">Kasir</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="customer">Customer</label>
              </td>
              <td>
                <div class="form-group">
                  <select name="" id="customer" class="form-control">
                    <option value="Umum">Umum</option>
                    <?php foreach($customers as $customer): ?>
                    <option value="<?= $customer->name; ?>"><?= $customer->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top;">
                <label for="barcode">Barcode</label>
              </td>
              <td>
                <div class="form-group input-group">
                  <input type="hidden" id="item_id">
                  <input type="hidden" id="price">
                  <input type="hidden" id="stock">
                  <input type="hidden" id="qty_cart">
                  <input type="text" id="barcode" class="form-control" autofocus autocomplete="off">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </td>
            </tr>

            <table width="100%">
              <tr>
                <div class="row">
                  <div class="col-md-6">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" id="qty" value="1" min="1" max="" class="form-control">
                      </div>
                    </form>         
                  </div>
                  
                  <div class="col-md-6">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="discount-item">Discount Item</label>
                        <input type="number" id="discount-item" value="0" min="0" max="" class="form-control">
                      </div>
                    </form>
                  </div>
                </div>
              </tr>
            </table>

            <tr>
              <td></td>
              <td>
                <div>
                  <button type="button" id="add_cart" class="btn btn-primary pull-right">
                    <i class="fa fa-cart-plus"></i> Add
                  </button>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="box box-widget">
        <div class="box-body">
          <div align="right">
            <h4>Invoice <b><span id="invoice"><?= $invoice; ?></span></b></h4>
            <h1><b><span id="grand-total2" style="font-size: 50pt;">0</span></b></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="box box-widget">
        <div class="box-body">
          <table class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Barcode</th>
                <th>Product Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th width="10%">Discount Item</th>
                <th width="15%">Total</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="cart_table">
              <?php $this->view('transaction/sale/cart_data') ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- <form action="<?= base_url('sale/payment') ?>" method="post">
  </form> -->

  <div class="row">
    <div class="col-lg-3">
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top; width:40%">
                <label for="sub-total">Sub Total <small>(Rp)</small></label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="sub-total" name="subtotal" class="form-control" readonly>
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="discount">Discount <small>(Rp)</small></label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="discount" name="" value="0" min="0" max="" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="grand-total">Grand Total <small>(Rp)</small></label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="grand-total" name="" value="" class="form-control" readonly>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top; width:30%">
                <label for="cash">Cash</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="cash" value="0" min="0" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top; width:30%">
                <label for="change">Change</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="change" class="form-control" readonly>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top;">
                <label for="note">Note</label>
              </td>
              <td>
                <div>
                  <textarea name="" id="note" rows="3" class="form-control"></textarea>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div>
        <button type="button" id="process-payment" class="btn btn-flat btn-lg btn-success">
          <i class="fa fa-paper-plane-o"></i> Process Payment
        </button>
      </div>
    </div>

  </div>

</section>

<!-- Modal -->
<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Select Product Item</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Unit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($items as $item): ?>
            <tr>
              <td><?= $item->barcode; ?></td>
              <td><?= $item->name; ?></td>
              <td class="text-right"><?= indo_currency($item->price); ?></td>
              <td class="text-right"><?= $item->stock; ?></td>
              <td><?= $item->unit_name; ?></td>
              <td class="text-center">
                <button class="btn btn-xs btn-info" id="select" 
                  data-id = "<?= $item->item_id; ?>"
                  data-barcode = "<?= $item->barcode; ?>"
                  data-price = "<?= $item->price; ?>"
                  data-stock = "<?= $item->stock; ?>">
                  <i class="fa fa-check"> Select</i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#select', function(){
    $('#item_id').val($(this).data('id'))
    $('#barcode').val($(this).data('barcode'))
    $('#price').val($(this).data('price'))
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')
  })

  $(document).on('click', '#add_cart', function(){
    var item_id = $('#item_id').val()
    var price = $('#price').val()
    var stock = $('#stock').val()
    var qty = $('#qty').val()
    var discount_item = $('#discount-item').val()
    // alert(discount_item);
    if(item_id == ''){
      alert('Product belum dipilih!')
      $('#barcode').focus()
    }
    else if(stock - qty < 0){
      alert('Stock tidak mencukupi!')
      $('#item_id').val('')
      $('#qty').val(1)
      $('#barcode').val('')
      $('#barcode').focus()
    }
    else{
      $.ajax({
        type: 'POST',
        url: '<?= site_url('sale/process') ?>',
        data: {'add_cart': true, 'item_id': item_id, 'price': price, 'qty': qty, 'discount_item': discount_item},
        dataType: 'json',
        success: function(result){
          if(result.success == true){
            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function(){
              calculate()
            })
            window.location="<?= site_url('sale') ?>"
            $('#barcode').val('')
            $('#qty').val(1)
            $('#barcode').focus()
          }
          else{
            alert('Gagal tambah item cart')
            $('#barcode').val('')
            $('#qty').val(1)
            $('#barcode').focus()
          }
        }
      })
    }
  })

  function calculate(){
    var subtotal = 0;
    $('#cart_table tr').each(function(){
      subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#sub-total').val(0) : $('#sub-total').val(subtotal)

    var discount = $('#discount').val()
    var grandtotal = subtotal - discount
    if(isNaN(grandtotal)){
      $('#grand-total').val(0)
      $('#grand-total2').text(0)
    }
    else{
      $('#grand-total').val(grandtotal)
      $('#grand-total2').text(grandtotal)
    }

    var cash = $('#cash').val()
    cash != 0 ? $('#change').val(cash - grandtotal) : $('#change').val(0)

    // if(discount == ''){
    //   $('#discount').val(0)
    // }
  }

  $(document).on('keyup mouseup', '#discount, #cash', function(){
    calculate()
  })
  
  $(document).ready(function(){
    calculate()
  })

  $(document).on('click', '#del_cart', function(){
    var cart_id = $(this).data('cartid')
    // alert(cart_id);
    $.ajak({
      type: 'POST',
      url: '<?= site_url('sale/cart_del') ?>',
      dataType: 'json',
      data: {'cart_id': cart_id},
      success: function(result){
        if(result.success == true){
          $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function(){
            calculate()
          })
        }
        else{
          alert('Gagal hapus item cart')
        }
      }
    })
  })

  $('#barcode').keypress(function (e){
    var key = e.which;
    var barcode = $(this).val();
    if(key == 13){
      $.ajax({
        type: 'POST',
        url: '<?= site_url('sale/get_item') ?>',
        data: {'barcode': barcode},
        dataType: 'json',
        success: function(result){
          if(result.success == true){
            $('#item_id').val(result.item.item_id)
            $('#barcode').val(barcode)
            $('#price').val(result.item.price)
            $('#stock').val(result.item.stock)

            $('#add_cart').click()
          }
          else{
            alert('Product tidak ditemukan!');
            $('#barcode').val('')
          }
        }
      })
    }
  });

  // $('#discount').keyup(function(){
  //   var discount = $('#discount').val()
  //   var subtotal = document.getElementById('subtotal').value;
  //   var grandtotal = subtotal - discount
  //   $('#grand-total').val(grandtotal)
  //   // if(isNaN(grandtotal)){
  //   //   $('#grand-total').val(0)
  //   //   $('#grand-total2').text(0)
  //   // }
  //   // else{
  //   //   $('#grand-total').val(grandtotal)
  //   //   $('#grand-total2').text(grandtotal)
  //   // }
  // });

  // $('#discount').keyup(function(){
  //   var discount = $(this).val();
  //   var subtotal = document.getElementById('subtotal').value;
  //   $('#grand-total').val(subtotal - discount);
  //   $('#grandtotal2').val(subtotal - discount);
  // });

  $(document).on('click', '#process-payment', function(){
    var customer = $('#customer').val()
    var subtotal = $('#sub-total').val()
    var discount = $('#discount').val()
    var grandtotal = $('#grand-total').val()
    var cash = $('#cash').val()
    var change = $('#change').val()
    var note = $('#note').val()
    var date = $('#date').val()
    // alert(customer)
    if(subtotal < 1){
      alert('Belum ada product item yang dipilih!')
      $('#barcode').focus()
    }
    else if(cash < 1){
      alert('Jumlah uang cash belum diinput!')
      $('#barcode').focus()
    }
    else{
      $.ajax({
        type: 'POST',
        url: '<?= site_url('sale/process') ?>',
        data: {
          'process_payment': true,
          'customer': customer,
          'subtotal': subtotal,
          'discount': discount,
          'grandtotal': grandtotal,
          'cash': cash,
          'change': change,
          'note': note,
          'date': date
        },
        dataType: 'json',
        success: function(result){
          if(result.success == true){
            alert('Transaksi berhasil')
            window.open('<?= site_url('sale/cetak/') ?>' + result.sale_id, '_blank')
          }
          else{
            alert('Transaksi gagal!')
          }
          location.href='<?= site_url('sale') ?>'
        }


      })

    }
  })

  
</script>


