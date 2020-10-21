<?php
/*
 * Cinema's Page (admin)
 *
 * © 2020 Team PodaPunde
 * 
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="container mt-lg-5">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Bioscoop</th>
      <th scope="col">Stad</th>
      <th scope="col">Regio</th>
      <th scope="col">Bekijken</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data["cinemaList"] as $cinema) { ?>
      
      <tr>
        <th scope="row"><?php echo $cinema->name; ?></th>
        <td><?php echo $cinema->city; ?></td>
        <td><?php echo $cinema->province; ?></td>
        <td><a class="btn btn-outline-secondary" href="<?php echo URLROOT . "/cms/cinemaDetails?cinema_id=" . $cinema->cinema_id; ?>">Details</a></td>
      </tr>

    <?php } ?>
  </tbody>
</table>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>



