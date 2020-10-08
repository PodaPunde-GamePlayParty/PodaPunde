<?php include APPROOT."/views/fragments/header.php"; ?>

<div class="container mt-3">
    <h1 class="text-center"><?php echo $data["title"]; ?></h1>

    <table border=1>
    <?php
    foreach($data["bioscopen"] as $bioscopen) {
    	echo "<tr>";
        echo "<td>" . $bioscopen->name . "</td>";
    	echo "</tr>";
    }
    ?>
    </table>
</div>


<?php include APPROOT."/views/fragments/footer.php"; ?>
