<?php
/*
 * Overview Page (Cinama account)
 *
 * © 2020 Team PodaPunde
 * 
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="container mt-lg-3 mt-2">
  <h2><?php echo $data['title']; ?></h2>

<?php
$cinema = $data["cms"]["cinema"];
$cms = $data["cms"];

// echo "cinema_id = " . $cinema->cinema_id . "<br>";
// echo "user_id = " . $cinema->user_id . "<br>";
// echo "name = " . $cinema->name . "<br>";
// echo "adress = " . $cinema->adress . "<br>";
// echo "city = " . $cinema->city . "<br>";
// echo "zipcode = " . $cinema->zipcode . "<br>";
// echo "province = " . $cinema->province . "<br>";
// echo "images = " . $cinema->images . "<br>";
// echo "description = " . $cinema->description . "<br>";

// echo "<br><hr><br>";


// foreach ($cms["cinema_halls"] as $hall) {
//   echo "hall_id = " . $hall->hall_id . "<br>";
//   echo "cinema_id = " . $hall->cinema_id . "<br>";
//   echo "hall_number = " . $hall->hall_number . "<br>";
//   echo "quantity_chairs = " . $hall->quantity_chairs . "<br>";
//   echo "wheelchair_accessible = " . $hall->wheelchair_accessible . "<br>";
//   echo "screen_size = " . $hall->screen_size . "<br>";
//   echo "version = " . $hall->version . "<br>";
    
  // echo "<br>";
  // foreach ($cms["hall_facilities"] as $facility) {
  //   echo "hall_id = " . $facility[$hall->hall_id]->hall_id . "<br>";
  //   echo "facility = " . $facility[$hall->hall_id]->facility . "<br>";
  // }

//   echo "<br><hr><br>";
// }
?>

  <div class="row">
    <div class="col-md-6 mb-md-0 p-md-4">
      <img src="<?php echo IMAGEROOT . $cinema->images; ?>" class="w-100" alt="<?php echo $cinema->name; ?>">
    </div>
    <div class="col-md-6 position-static p-4 pl-md-0">
      <h5 class="mt-0"><?php echo $cinema->name; ?></h5>
      <p><?php echo $cinema->description; ?></p>
      <a href="#" class="btn btn-primary">Knop</a>
    </div>
  </div>

  <div class="row">
    <?php
    foreach ($cms["cinema_halls"] as $hall) { ?>
    
      <div class="col-lg-3 col-md-4 col-12">
        <p id="BoldStyle">Zaal: <?php echo $hall->hall_number; ?></p>
        <p id="BoldStyle"><i class="fas fa-couch"></i> <?php echo $hall->quantity_chairs; ?> Stoelen</p>
        <p id="BoldStyle"><i class="fas fa-wheelchair"></i> <?php echo $hall->wheelchair_accessible; ?> Rolstoel plaatsen</p>
        <p id="BoldStyle"><i class="fas fa-expand-alt"></i> <?php echo $hall->screen_size; ?></p>
        <p id="BoldStyle"><i class="fas fa-wrench"></i> <?php echo $hall->version; ?></p>
      </div>

    <?php } ?>
  </div>
</div>






<?php include APPROOT."/views/fragments/footer.php"; ?>
