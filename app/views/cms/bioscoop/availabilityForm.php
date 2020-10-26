<?php
/*
 * hall Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php";
$hall = $data["hall"];
?>

<div class="row">

    <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <ul class="list-group m-md-3 m-0">
            <li class="list-group-item">
              <a class="" href="<?php echo URLROOT; ?>/cms/zalen">Zalen</a>
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
        <div class="col-lg-3 col-md-6 col-12 mb-lg-5 mb-md-3 mb-2" style="width: 18rem;">
          <div class="card">

            <div class="card-body">
              <h5 id="BoldStyle">Zaal: <?php echo $hall->hall_number; ?></h5>

              <div class="card-text">
                <p id="BoldStyle"><i class="fas fa-couch"></i> <?php echo $hall->quantity_chairs; ?> Stoelen</p>
                <p id="BoldStyle"><i class="fas fa-wheelchair"></i> <?php echo $hall->wheelchair_accessible; ?> Rolstoel plaatsen</p>
                <p id="BoldStyle"><i class="fas fa-expand-alt"></i> <?php echo $hall->screen_size; ?></p>
                <p id="BoldStyle"><i class="fas fa-wrench"></i> <?php echo $hall->version; ?></p>

              <div id="alignmentCenter">
                </div>
              </div>
          </div>
    </div>
</div>

<div class="container mt-lg-5 mt-2">
    <div class="row form-rows justify-content-center">
        <div class="col-lg-8 col-12">
            <form method="post">
                <div class="form-group">
                    <label for="date" class="font-weight-bold">Datum</label>
                    <input type="date" name="date" class="form-control form-control-lg
                    <?php echo (!empty($data['date_error'])) ? "is-invalid" : ""; ?>"
                    value="<?php echo $data['date'] ?>">
                    <span class="invalid-feedback"><?php echo $data['date_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="time" class="font-weight-bold">Begin tijd</label>
                    <input type="time" name="begin_time" class="form-control form-control-lg
                    <?php echo (!empty($data['time_error'])) ? "is-invalid" : ""; ?>"
                    value="<?php echo $data['time'] ?>">
                    <span class="invalid-feedback"><?php echo $data['time_error']; ?></span>
                </div>

                <input type="hidden" name="hall_id" value="<?php echo $hall->hall_id ?>">

                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
