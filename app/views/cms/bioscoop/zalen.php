<?php
/*
 * Halls Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php";
$cinema = $data["cms"]["cinema"];
$cms = $data["cms"];
?>

<div class="row">

    <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <ul class="list-group m-md-3 m-0">
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/index"><- Terug</a>
          </li>
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/overzicht">Bioscoop overzicht</a>
          </li>
        </ul>
    </div>

    <!-- CMS content -->
    <div class="col-12 col-md-9">
        <div class="row mt-lg-5">
          <?php foreach ($cms["cinema_halls"] as $halls) { ?>

            <div class="col-lg-3 col-md-6 col-12 mb-lg-5 mb-md-3 mb-2" style="width: 18rem;">
              <div class="card">

                <div class="card-body">
                  <h5 id="BoldStyle">Zaal: <?php echo $halls->hall_number; ?></h5>

                  <div class="card-text">
                    <p id="BoldStyle"><i class="fas fa-couch"></i> <?php echo $halls->quantity_chairs; ?> Stoelen</p>
                    <p id="BoldStyle"><i class="fas fa-wheelchair"></i> <?php echo $halls->wheelchair_accessible; ?> Rolstoel plaatsen</p>
                    <p id="BoldStyle"><i class="fas fa-expand-alt"></i> <?php echo $halls->screen_size; ?></p>
                    <p id="BoldStyle"><i class="fas fa-wrench"></i> <?php echo $halls->version; ?></p>
                  </div>

                  <div id="alignmentCenter">
                    <a href="<?php echo URLROOT;?>/cms/deleteHall?hall_id=<?php echo $halls->hall_id; ?>" class="form-control btn btn-light">Verwijder zaal: <?php echo $halls->hall_number; ?> </a>
                  </div>

                </div>
              </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
