<?php
/*
 * List of Cinemas that need to be verified Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php";

$users = $data["users"];
$cinemas = $data["cinemas"];
?>



<div class="row">

  <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <ul class="list-group m-md-3 m-0">

<?php

$authority = $_SESSION["authority"];
switch ($authorityl) {

    case ADMINISTRATOR: ?>
        <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/index"><- Terug</a>
        </li>

        <li class='list-group-item'>
          <a class='' href="<?php echo URLROOT; ?>/cms/cinemaList">Bioscopen overzicht</a>
        </li>
        
        <li class="list-group-item">
          <a class="" href="<?php echo URLROOT; ?>/cms/verifyCinema">Bioscopen Verfiëren</a>
        </li>
        <?php
    break;

    default:
        redirect("index");
    break;

} ?>

        </ul>
    </div>

    <!-- CMS content -->
    <div class="col-12 col-md-9 p-0 p-md-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Bioscoop</th>
                    <th scope="col">Account</th>
                    <th scope="col">Afkeuren</th>
                    <th scope="col">Goedkeuren</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cinemas as $cinema) { ?>
                    <tr>
                        <th scope="row"><?php echo $cinema->name; ?></th>
                        <td><?php echo $users[$cinema->user_id]->username; ?></td>
                        <td><?php echo $cinema->province; ?></td>
                        <td><a class="btn btn-outline-secondary" href="<?php echo URLROOT . "/cms/cinemaDetails?cinema_id=" . $cinema->cinema_id; ?>">Details</a></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
