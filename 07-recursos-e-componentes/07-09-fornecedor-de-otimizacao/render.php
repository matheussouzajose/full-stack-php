<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

  <?php
  require __DIR__ . "/../vendor/autoload.php";

  $seo = new \Source\Support\Seo();
  echo $seo->render(
    "Title",
    "Description",
    "https://www.upinside.com.br/fsphp",
    "https://www.upinside.com.br/fsphp/images/cover.jpg",
    );
  ?>
</head>
<body>
<h1><?= $seo->title; ?></h1>
<h1><?= $seo->description; ?></h1>

<?= "<pre>", print_r($seo->data(), true), "</pre>"?>
</body>
</html>