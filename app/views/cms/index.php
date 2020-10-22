<?php
/*
 * CMS Page (Admin)
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
            <a class="" href="<?php echo URLROOT; ?>/cms/zalen">Zalen</a>
          </li>
          <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/overzicht">Bioscoop overzicht</a>
          </li>
        </ul>
    </div>

    <!-- CMS content -->
    <div class="col-12 col-md-9 p-0 p-md-4">
        <h1>Welkom terug <?php echo $cinema->name ?></h1>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
