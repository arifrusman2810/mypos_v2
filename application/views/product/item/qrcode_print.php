<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR-code Product <?= $items->barcode ?></title>
</head>
<body>

  <?php 
  $qrCode = new Endroid\QrCode\QrCode($items->barcode);
  $qrCode->writeFile('uploads/qr-codes/item-'.$items->barcode.'.png');
  ?>

  <img src="<?= base_url('uploads/qr-codes/item-'.$items->barcode.'.png') ?>" print="true" size="65" alt="" width="200px">
  <br>


</body>
</html>