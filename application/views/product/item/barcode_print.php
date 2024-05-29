<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barcode Product <?= $items->barcode ?></title>
</head>
<body>
  <img src="<?= base_url('assets/') ?>php_barcode/barcode.php?text=<?= $items->barcode ?>&print=true$size=65" width="200px">
  <div style="margin-left: 20px;">
    <?= $items->barcode; ?>
  </div>
  
</body>
</html>