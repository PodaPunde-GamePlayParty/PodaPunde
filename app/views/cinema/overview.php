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
$cinema_already_exist = $data["cinema_already_exist"];
?>



<div class="row">

    <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <?php if(!$cinema_already_exist) { ?>
            <ul class="list-group m-md-3 m-0">
                <li class="list-group-item">
                    <a class="" href="<?php echo URLROOT; ?>/bioscopen/addCinema">Bioscoop toevoegen</a>
                </li>
            </ul>
        <?php } ?>
    </div>

    <!-- CMS content -->
    <div class="col-12 col-md-9 p-0 p-md-4">
        <h1>Welkom terug <?php echo $user->username ?></h1>
        <?php if($cinema_already_exist) { ?>
            <p>er is al een bioscoop aangemaakt voor dit account, wacht tot de contentmanger uw bioscoop heeft goedgekeurd</p>
        <?php } ?>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
