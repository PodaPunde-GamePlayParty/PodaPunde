<?php
/*
 * Overview Page (Cinama account)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php
include APPROOT."/views/fragments/header.php";

$cinema = $data["cinema"];

?>

<div class="container mt-lg-3 mt-2">
  <h1><?php echo $data['title']; ?></h1>

  <div class="row mt-lg-3">
    <div class="col-md-6 mb-md-0 p-md-4">
      <img src="<?php echo IMAGEROOT . $cinema->images; ?>" class="w-100" alt="<?php echo $cinema->name; ?>">
    </div>

    <div class="col-md-6 position-static p-4 pl-md-0">
      <h5 class="mt-0"><?php echo $cinema->name; ?></h5>
      <p><?php echo $cinema->description; ?></p>
    </div>
  </div>

  <div class="row mt-lg-5">
    <?php
    foreach ($data["cinema_halls"] as $hall) { ?>

      <div class="col-lg-3 col-md-6 col-12 mb-lg-5 mb-md-3 mb-2" style="width: 18rem;">
        <div class="card">

          <div class="card-body">
            <h5 id="BoldStyle">Zaal: <?php echo $hall->hall_number; ?></h5>

            <div class="card-text">
              <p id="BoldStyle"><i class="fas fa-couch"></i> <?php echo $hall->quantity_chairs; ?> Stoelen</p>
              <p id="BoldStyle"><i class="fas fa-wheelchair"></i> <?php echo $hall->wheelchair_accessible; ?> Rolstoel plaatsen</p>
              <p id="BoldStyle"><i class="fas fa-expand-alt"></i> <?php echo $hall->screen_size; ?></p>
              <p id="BoldStyle"><i class="fas fa-wrench"></i> <?php echo $hall->version; ?></p>
            </div>

          </div>
        </div>
      </div>
    <?php
    } ?>
  </div>
</div>

<?php include APPROOT."/views/fragments/footer.php"; ?>
