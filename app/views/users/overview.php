<?php include APPROOT."/views/fragments/header.php"; ?>

<h1><?php echo $data["title"]; ?></h1>

<table border=1>
<?php
foreach($data["users"] as $user) {

	echo "<tr>";
	echo "<td>" . $user->id . "</td>";
	echo "<td>" . $user->name . "</td>";
	echo "</tr>";
}
?>
</table>

<?php include APPROOT."/views/fragments/footer.php"; ?>