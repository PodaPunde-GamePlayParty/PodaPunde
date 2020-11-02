<?php
/*
 * `Delete Halls Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php";
  $hall = $data["hall"];
  $cinema = $data["cinema"];
?>

<div class="container mt-lg-5 mt-3">
    <h1 class="text-center"> Weet u zeker dat u dit wilt verwijderen? </h1><br>
</div>

<div class="container">
  <div class="justify-content-center">
    <h5 class="text-center">Bioscoop: <?php echo $cinema->name; ?></p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <p id="BoldStyle"><i class="fas fa-film"></i> <?php echo $hall->hall_number; ?></p>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <p id="BoldStyle"><i class="fas fa-couch"></i> <?php echo $hall->quantity_chairs; ?> Stoelen</p>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <p id="BoldStyle"><i class="fas fa-wheelchair"></i> <?php echo $hall->wheelchair_accessible; ?> Rolstoel plaatsen</p>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <p id="BoldStyle"><i class="fas fa-expand-alt"></i> <?php echo $hall->screen_size; ?></p>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <p id="BoldStyle"><i class="fas fa-wrench"></i> <?php echo $hall->version; ?></p>
        </li>
  </div>
</div>

    <div class="row">
      <div id="alignmentCenter" class="col">
      <a class="btn btn-outline-danger" href="<?php echo URLROOT; ?>/cms/deleteHallConfirmed?hall_id=<?php echo $hall->hall_id; ?>">Verwijder</a>
      <?php
      $authority = $_SESSION["authority"];

      switch ($authority) {
        case VERIFIED_CINEMA:
          echo "<a class='btn btn-outline-success' href='" . URLROOT . "/cms/zalen'>Annuleren</a>";
        break;

        case CONTENT_MANAGER:
          echo "<a class='btn btn-outline-success' href='" . URLROOT . "/cms/cinemaDetails?cinema_id=" . $hall->cinema_id . "'>Annuleren</a>";
        break;

        default:
          echo "<a class='btn btn-outline-success' href='" . URLROOT . "/cms/index'>Annuleren</a>";
        break;

      }
      ?>
      </div>
    </div>

      <!-- side nav CMS -->
      <!-- <div class="col-12 col-md-3">
          <ul class="list-group m-md-3 m-0">
            <li class="list-group-item">
              <a class="" href="#">Zalen</a>
            </li>
            <li class="list-group-item">
              <a class="" href="<?php echo URLROOT; ?>/cms/overzicht">Bioscoop overzicht</a>
            </li>
          </ul>
      </div> -->

  </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
