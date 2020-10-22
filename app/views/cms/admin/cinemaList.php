<?php
/*
 * Cinema's Page (admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="col-12 col-md-3">
  <ul class="list-group m-md-3 m-0">
    <li class='list-group-item'>
      <a class="" href="<?php echo URLROOT; ?>/cms/index"><- Terug</a>
    </li>
  </ul>
</div>

<div class="container mt-lg-5 mt-3">
    <table class="table table-hover table-sm">
      <thead class="thead-dark">
        <tr>
          <th class="text-center font-weight-light" scope="col">Bioscoop:</th>
          <th class="text-center font-weight-light" scope="col">Stad:</th>
          <th class="text-center font-weight-light" scope="col">Regio:</th>
          <th class="text-center font-weight-light" scope="col">Bekijken:</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["cinemaList"] as $cinema) { ?>

          <tr>
            <th class="text-center font-weight-normal" scope="row"><?php echo $cinema->name; ?></th>
            <td class="text-center font-weight-light text-uppercase"><?php echo $cinema->city; ?></td>
            <td class="text-center font-weight-light text-uppercase"><?php echo $cinema->province; ?></td>
            <td class="text-center font-weight-light"><a class="btn btn-info" href="<?php echo URLROOT . "/cms/cinemaDetails?cinema_id=" . $cinema->cinema_id; ?>">Details</a></td>
          </tr>

        <?php } ?>
      </tbody>
    </table>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>
