<?php
/*
 * List of Cinemas that need to be verified Page (Admin)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php";

if(!$data["empty"]) {
    $users = $data["users"];
    $cinemas = $data["cinemas"];
    echo "<h1 id='alignmentCenter'>" . $data['title'] . "</h1>";
}
?>



<div class="row">

  <!-- side nav CMS -->
    <div class="col-12 col-md-3">
        <ul class="list-group m-md-3 m-0">

<?php

$authority = $_SESSION["authority"];
switch ($authority) {

    case CONTENT_MANAGER: ?>
        <li class="list-group-item">
            <a class="" href="<?php echo URLROOT; ?>/cms/index"><- Terug</a>
        </li>

        <li class='list-group-item'>
          <a class='' href="<?php echo URLROOT; ?>/cms/cinemaList">Bioscopen overzicht</a>
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
        <?php if(!$data["empty"]) { ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Bioscoop</th>
                    <th scope="col">Account</th>
                    <th scope="col">Afkeuren</th>
                    <th scope="col">Goedkeuren</th>
                    <th scope="col">Bekijken</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($cinemas as $cinema) { ?>
                        <tr>
                            <th scope="row"><?php echo $cinema->name; ?></th>
                            <td><?php echo $users[$cinema->user_id]->username; ?></td>
                            <td><a class="btn btn-outline-danger" href="<?php echo URLROOT . "/cms/deleteCinema?cinema_id=" . $cinema->cinema_id; ?>">Afkeuren</a></td>
                            <td><a class="btn btn-outline-success" href="<?php echo URLROOT . "/cms/verifyCinemaAction?cinema_id=" . $cinema->cinema_id; ?>">Goedkeuren</a></td>
                            <td><a class="btn btn-light" href="<?php echo URLROOT . "/cms/cinemaDetails?cinema_id=" . $cinema->cinema_id; ?>">Bekijken</a></td>
                        </tr>
    
                    <?php
                    } ?>
            </tbody>
        </table>
        <?php
        } else { ?>
            <p id="BoldStyle">alle bioscopen zijn al geverifiëerd</p>
        <?php } ?>
    </div>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
