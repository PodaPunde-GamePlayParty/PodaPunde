<?php
/*
 * Bioscopen Page (Content)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="container mt-lg-5">
  <h1 class="text-center"><?php echo $data["title"]; ?></h1>

  <?php
    echo "<div class='row mt-lg-5'>";
    foreach($data["bioscopen"] as $bioscopen) {
      echo "<div class='col-lg-3 col-md-6 col-12 mb-lg-5 mb-md-3 mb-2' style='width: 18rem;'>"; ?>

      <div id="cardSize" class="card">
        <img src="<?php echo IMAGEROOT . $bioscopen->images; ?>" id="cardImage" class="card-img-top" alt="<?php echo $bioscopen->name; ?>">

        <div class="card-body">
          <h5 class="card-title"><?php echo $bioscopen->name; ?></h5>
          <div class="card-text">
            <?php
            echo "<p id='noMarginBottom' class='font-weight-bold'>Regio:   " . $bioscopen->province . "</p>";
            echo "<p>";
            echo $bioscopen->adress . "<br>";
            echo $bioscopen->zipcode . "<br>";
            echo $bioscopen->city;
            echo "</p>";
            ?>
          </div>
        </div>

        <div id="alignmentCenter">
          <a href="<?php echo URLROOT . "/bioscopen/cinemaDetails?cinema_id=" . $bioscopen->cinema_id; ?>" class="btn btn-primary mb-3">Reserveren</a>
        </div>

      </div>
    <?php
      echo "</div>";
    }
    echo "</div>";
?>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>
