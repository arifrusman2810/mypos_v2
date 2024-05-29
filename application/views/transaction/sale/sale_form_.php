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
                  <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
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
                    <option value="">Umum</option>
                    <?php foreach($customers as $customer): ?>
                    <option value="<?= $customer->customer_id; ?>"><?= $customer->name; ?></option>
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
              <td style="vertical-align: top; width:30%">
                <label for="barcode">Barcode</label>
              </td>
              <td>
                <div class="form-group input-group">
                  <input type="hidden" id="item_id">
                  <input type="hidden" id="price">
                  <input type="hidden" id="stock">
                  <input type="hidden" id="qty_cart">
                  <input type="text" id="barcode" class="form-control" autofocus>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="qty">Qty</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="qty" value="1" min="1" max="" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <div>
                  <button type="button" id="add_cart" class="btn btn-primary">
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

  <div class="row">
    <div class="col-lg-3">
      <div class="box box-widget">
        <div class="box-body">
          <table width="100%">
            <tr>
              <td style="vertical-align: top; width:30%">
                <label for="sub-total">Sub Total</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="sub-total" value="" class="form-control" readonly>
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="discount">Discount</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="discount" value="0" min="0" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top;">
                <label for="grand-total">Grand Total</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="number" id="grand-total" class="form-control" readonly>
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
        <button id="cancel-payment" class="btn btn-flat btn-warning">
          <i class="fa fa-refresh"></i> Cancel
        </button><br><br>
        <button id="process-payment" class="btn btn-flat btn-lg btn-success">
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
    var barcode = $(this).data('barcode')
    $('#item_id').val($(this).data('id'))
    $('#barcode').val(barcode)
    $('#price').val($(this).data('price'))
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')
    get_cart_qty(barcode)
  })

  function get_cart_qty(barcode){
    $('#cart_table tr').each(function(){
      // var qty_cart = $(this).find("td").eq(4).html()
      var qty_cart = $("#cart_table td.barcode:contains('"+barcode+"')").parent().find("td").eq(4).html()
      if(qty_cart != null){
        $('#qty_cart').val(qty_cart)
      }
      else{
        $('#qty_cart').val(0)
      }
    })
  }

  $(document).on('click', '#add_cart', function(){
    var item_id = $('#item_id').val()
    var price = $('#price').val()
    var stock = $('#stock').val()
    var qty = $('#qty').val()
    if(item_id == ''){
      alert('Product belum dipilih!')
      $('#barcode').focus()
    }
    else if(stock < 1 || parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))){
      alert('Stock tidak mencukupi!')
      $('#qty').focus()
    }
    else{
      $.ajax({
        type: 'POST',
        url: '<?= site_url('sale/process') ?>',
        data: {'add_cart': true, 'item_id': item_id, 'price': price, 'qty': qty},
        dataType: 'json',
        success: function(result){
          if(result.success == true){
            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function(){
              calculated()
            })
            $('#item_id').val('')
            $('#barcode').val('')
            $('#qty').val('1')
            $('#barcode').focus()
          }
          else{
            alert('Gagal tambah item cart')
          }
        }
      })
    }
  })

  $(document).on('click', '#del_cart', function(){
    if(confirm('Apakah anda yakin?')){
      var cart_id = $(this).data('cart-id')
      $.ajak({
        type: 'POST',
        url: '<?= site_url('sale/cart_del') ?>',
        dataType: 'json',
        data: {'cart_id': cart_id},
        success: function(result){
          if(result.success == true){
            $('#cart)table').load('<?= site_url('sale/cart_data') ?>', function(){
              calculate()
            })
          }
          else{
            alert('Gagal hapus item cart')
          }
        }
      })
    }
  })
  
  $(document).on('click', '#update_cart', function(){
    $('#cartid_item').val($(this).data('cartid'))
    $('#barcode_item').val($(this).data('barcode'))
    $('#product_item').val($(this).data('product'))
    $('#stock_item').val($(this).data('stock'))
    $('#price_item').val($(this).data('price'))
    $('#qty_item').val($(this).data('qty'))
    $('#total_before').val($(this).data('price') * $(this).data('qty'))
    $('#discount_item').val($(this).data('discount'))
    $('#total_item').val($(this).data('total'))
  })

  function count_edit_modal(){
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()

    total_before = price * qty
    $('#total_before').val(total_before)
    
    total = (price - discount) * qty
    $('#total_item').val(total)
    
    if(discount == ''){
      $('#discount_item').val(0)
    }
  }


  $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function(){
    count_edit_modal()
  })

  $(document).on('click', '#edit_cart', function(){
    var cart_id = $('#cartid_item').val()
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var discount = $('#discount_item').val()
    var total = $('#total_item').val()
    var stock = $('#stock_item').val()

    if(price == '' || price < 1){
      alert('Harga tidak boleh kosong!')
      $('#price_item').focus()
    }
    else if(qty == '' || qty < 1){
      alert('Qty tidak boleh kosong!')
      $('#qty_item').focus()
    }
    else if(parseInt(qty) > parseInt(stock)){
      alert('Stock tidak mencukupi!')
      $('#qty_item').focus()
    }
    else{
      $.ajak({
        type: 'POST',
        url: '<?= site_url('sale/process') ?>',
        data: {
          'edit_cart': true,
          'cart_id': cart_id,
          'price': price,
          'qty': qty,
          'discount': discount,
          'total': total,
        },
        dataType: 'json',
        success: function(result){
          if(result.success == true){

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
    isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

    var discount = $('#discount').val()
    var grand_total = subtotal - discount
    if(isNaN(grangtotal)){
      $('#grand_total').val(0)
      $('#grand_total2').text(0)
    }
    else{
      $('#grand_total').val(grand_total)
      $('#grand_total2').text(grandtotal)
    }

    var cash = $('#cash').val()
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

    if(discount == ''){
      $('#discount').val(0)
    }
  }

  $(document).on('keyup mouseup', '#discount, #cash', function(){
    calculate()
  })
  
  $(document).ready(function(){
    calculate()
  })

  // Payment process
  $(document).on('click', 'process_payment', function(){
    var customer_id = $('#customer').val()
    var subtotal = $('#sub_total').val()
    var discount = $('#discount').val()
    var grandtotal = $('#grand_total').val()
    var cash = $('#cash').val()
    var change = $('#change').val()
    var note = $('#note').val()
    var date = $('#date').val()

    if(subtotal < 1){
      alert('Belum ada product item yang dipilih!')
      $('#barcode').focus()
    }
    else if(cash < 1){
      alert('Jumlah uang cash belum diinput!')
      $('#barcode').focus()
    }
    else{
      alert('Yakin proses transaksi?')
      $.ajax({
        type: 'POST',
        url: <?= site_url('sale/process') ?>,
        data: {
          'process_payment': true,
          'customer_id': customer_id,
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
          if(result.success){
            alert('Transaksi berhasil');
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

  $(document).on('click', '#cancel_payment', function(){
    if(confirm('Apakah anda yakin?')){
      $.ajax({
        type: 'POST',
        url: <?= site_url('sale/cart_del') ?>,
        data: {'cancel_payment': true},
        dataType: 'json',
        success: function(result){
          if(result.success == true){
            $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function(){
              calculate()
            })
          }
        }
      })
      $('#discount').val(0)
      $('#cash').val(0)
      $('#customer').val(0)
      $('#barcode').val(0)
      $('#barcode').focus()
    }
  })

  $('#barcode').keypress(function (e){
    var key = e.which;
    var barcode = $(this).val();
    if(key == 13){
      alert(barcode)
      // $.ajax({
      //   type: 'POST',
      //   url: '<?= site_url('sale/get_item') ?>',
      //   data: {'barcode': barcode},
      //   dataType: 'json',
      //   success: function(result){
      //     if(result.success == true){
      //       $('#item_id').val(result.item.item_id)
      //       $('#barcode').val(barcode)
      //       $('#price').val(result.item.price)
      //       $('#stock').val(result.item.stock)

      //       $('#add_cart').click();
      //     }
      //     else{
      //       alert('Product tidak ditemukan!');
      //       $('#barcode').val('');
      //     }
      //   }
      // })
    }
  });
</script>


