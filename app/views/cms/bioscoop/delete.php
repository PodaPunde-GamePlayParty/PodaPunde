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
?>

<div class="container mt-lg-5 mt-3">
  <div class="row">
    <div class="col-lg-6 col-md-12">
    <?php
      echo "Zaal-Id: " . $hall->hall_id . "<br>";
      echo "Bioscoop-Id: " . $hall->cinema_id . "<br>";
      echo "Zaalnummer: " . $hall->hall_number . "<br>";
      echo "Aantal stoelen: " . $hall->quantity_chairs . "<br>";
      echo "Rolstoel plekken: " . $hall->wheelchair_accessible . "<br>";
      echo "Schermgrootte: " . $hall->screen_size . "<br>";
      echo "Versie: " . $hall->version . "<br>";
    ?>
  </div>

    <div class="col-lg-3 col-md-6">
      <a class="btn btn-outline-danger form-control" href="<?php echo URLROOT; ?>/cms/deleteHallConfirmed?hall_id=<?php echo $hall->hall_id; ?>">Verwijder</a>
    </div>

    <div class="col-lg-3 col-md-6">
      <?php
      $authority = $_SESSION["authority"];
    
      switch ($authority) {
        case VERIFIED_CINEMA:
          echo "<a class='btn btn-outline-success form-control' href='" . URLROOT . "/cms/zalen'>Annuleren</a>";
        break;

        case CONTENT_MANAGER:
          echo "<a class='btn btn-outline-success form-control' href='" . URLROOT . "/cms/cinemaDetails?cinema_id=" . $hall->cinema_id . "'>Annuleren</a>";
        break;

        default:
          echo "<a class='btn btn-outline-success form-control' href='" . URLROOT . "/cms/index'>Annuleren</a>";
        break;

      }
      ?>
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
