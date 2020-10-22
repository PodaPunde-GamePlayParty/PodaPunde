<?php
/*
 * CMS Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>



<div class="row">

  <!-- side nav CMS -->
  <div class="col-12 col-md-3">
    <ul class="list-group m-md-3 m-0">

<?php

$authority_level = $_SESSION["authority"];
switch ($authority_level) {
  case '2':
    $cinema = $data["cms"]["cinema"];
    $username = $cinema->name;

    echo "<li class='list-group-item'>";
    echo " 	<a class='' href='" . URLROOT . "/cms/zalen'>Zalen</a>";
    echo "</li>";
    echo "<li class='list-group-item'>";
    echo "<a class='' href='" . URLROOT . "/cms/overzicht'>Bioscoop overzicht</a>";
    echo "</li>";
  break;

  case '3':
    $user = $data["user"];
    $username = $user->username;

    echo "<li class='list-group-item'>";
    echo "  <a class='' href='" . URLROOT . "/cms/cinemaList'>Bioscopen overzicht</a>";
    echo "</li>";
  break;

  default:
  redirect("index");
break;

} ?>

    </ul>
  </div>

  <!-- CMS content -->
  <div class="col-12 col-md-9 p-0 p-md-4">
    <h1>Welkom terug <?php echo $username ?>!</h1>
  </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
