<?php include APPROOT."/views/fragments/header.php"; ?>


<h1><?php echo $data["title"]; ?></h1>
<p><?php echo $data["content"]; ?></p>

<?php
$userData = $data["userRow"];
?>

<p><?php echo "Het id is " . $userData->id . "<br>"; ?></p>
<p><?php echo "De naam is " . $userData->name . "<br>"; ?></p>
<p><?php echo "Het email is " . $userData->email . "<br>"; ?></p>
<p><?php echo "Gemaakt op " . $userData->date_created . "<br>"; ?></p>

<?php include APPROOT."/views/fragments/footer.php"; ?>