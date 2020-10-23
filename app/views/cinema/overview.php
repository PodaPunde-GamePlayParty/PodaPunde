<?php
/*
 * CMS Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; 

$user = $data["user"];
$cinema_already_exists = $data["cinema_already_exists"];
?>



<div class="row">

  <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <ul class="list-group m-md-3 m-0">
            <li class="list-group-item">
                <?php if(!$cinema_already_exists) { ?>
                    <a class="" href="<?php echo URLROOT; ?>/bioscoop/addCinema">Bioscoop toevoegen</a>";
                <?php } ?>
            </li>
        </ul>
    </div>

    <!-- CMS content -->
    <div class="col-12 col-md-9 p-0 p-md-4">
        <h1>Welkom terug <?php echo $user->username ?></h1>
        <?php if(!$cinema_already_exists) { ?>
            <p>er is al een bioscoop aangemaakt voor dit account, wacht tot de contentmanger uw bioscoop heeft goedgekeurd</p>
        <?php } ?>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
