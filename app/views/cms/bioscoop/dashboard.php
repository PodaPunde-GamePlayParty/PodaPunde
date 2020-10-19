<?php
/*
 * Overview Page (Cinama account)
 *
 * © 2020 Team PodaPunde
 * 
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="container mt-lg-3">
  <h2><?php echo $data['title']; ?></h2>
</div>

<?php
$cinema = $data["cms"]["cinema"];
$cms = $data["cms"];

echo "cinema_id = " . $cinema->cinema_id . "<br>";
echo "user_id = " . $cinema->user_id . "<br>";
echo "name = " . $cinema->name . "<br>";
echo "adress = " . $cinema->adress . "<br>";
echo "city = " . $cinema->city . "<br>";
echo "zipcode = " . $cinema->zipcode . "<br>";
echo "province = " . $cinema->province . "<br>";
echo "images = " . $cinema->images . "<br>";
echo "description = " . $cinema->description . "<br>";

echo "<br><hr><br>";


foreach ($cms["cinema_halls"] as $hall) {
  echo "hall_id = " . $hall->hall_id . "<br>";
  echo "cinema_id = " . $hall->cinema_id . "<br>";
  echo "hall_number = " . $hall->hall_number . "<br>";
  echo "quantity_chairs = " . $hall->quantity_chairs . "<br>";
  echo "wheelchair_accessible = " . $hall->wheelchair_accessible . "<br>";
  echo "screen_size = " . $hall->screen_size . "<br>";
  echo "version = " . $hall->version . "<br>";
    
  // echo "<br>";
  // foreach ($cms["hall_facilities"] as $facility) {
  //   echo "hall_id = " . $facility[$hall->hall_id]->hall_id . "<br>";
  //   echo "facility = " . $facility[$hall->hall_id]->facility . "<br>";
  // }

  echo "<br><hr><br>";
}
?>








<?php include APPROOT."/views/fragments/footer.php"; ?>
