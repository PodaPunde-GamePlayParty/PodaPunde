<?php
/*
 * Functions
 *
 * (C) 2020 Dyon van Raaij
 */

// encrypt password function
function encrypt($password) {
    $salted = SALTHEADER . $password . SALTTRAILER;
    return hash('ripemd160', $salted);
}

function redirect($page) {
    header('location: ' .URLROOT. "/" . $page);
}


// Flash message
// Example: flash("register_success","U bent succesvol geregistreerd", "alert alert-danger");
// In view: echo flash("register_success");
function flash($name, $message = "", $class="alert alert-success") {

	if (!empty($message)) {

		// If the message if filled, set the value
		// The name is used as the key to store both the message and the class
		$_SESSION[$name."_message"] = $message;
		$_SESSION[$name."_class"] = $class;

	} else {

		// No message passed, so display attemp

		if (!empty($_SESSION[$name."_message"])) {
			$class = !empty($_SESSION[$name."_class"]) ? $_SESSION[$name."_class"] : "";
			echo "<div class=\"" . $class . "\" id=\"msg-flash\">" . $_SESSION[$name."_message"] . "</div>";
			unset($_SESSION[$name."_message"]);
			unset($_SESSION[$name."_class"]);
		}
	}
}
