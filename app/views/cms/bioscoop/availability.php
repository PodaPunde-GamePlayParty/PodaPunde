<?php
/*
 * Availabillity Hall Page
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
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/index"><- Terug</a>
          </li>
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/overzicht">Bioscoop overzicht</a>
          </li>
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/availability">Beschikbaarheid opgeven</a>
          </li>
        </ul>
    </div>


    <!-- CMS content -->
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12 mt-lg-3 mt-0">
                <a href="<?php echo URLROOT;?>/cms/addAvailability?hall_id=<?php echo $data['hall']->hall_id; ?>" class="text-dark font-weight-bold">Beschikbaarheid toevoegen</a>
            </div>
        </div>

        <div class="row mt-lg-3 mt-0">
          <?php foreach ($data["availability"] as $availability) { ?>

            <div class="col-lg-3 col-md-6 col-12 mb-lg-5 mb-md-3 mb-2" style="width: 18rem;">
              <div class="card">

                <div class="card-body">
                  <h5 id="BoldStyle">Beschikbaarheid: <?php echo $availability->availability_id; ?></h5>

                  <div class="card-text">
                    <p id="BoldStyle"><i class="fa fa-door-open"></i> Zaal: <?php echo $availability->hall_id; ?></p>
                    <p id="BoldStyle"><i class="far fa-calendar-alt text-dark"></i> Datum: <?php echo $availability->date; ?></p>
                    <p id="BoldStyle"><i class="far fa-clock"></i> Start: <?php echo $availability->begin_time; ?></p>
                    <p id="BoldStyle"><i class="far fa-clock"></i> Eind: <?php echo $availability->end_time; ?></p>
                    <p id="BoldStyle"><i class="far fa-hourglass"></i> Tijd: <?php echo $availability->play_time; ?></p>
                  </div>

                </div>
              </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
