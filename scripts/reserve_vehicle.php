<?php
require_once(ROOT_PATH . '/scripts/helpers.php');
$message = "";
// RESERVE VEHICLE
if (isset($_POST['reserve'])) {
    $errors = [];
    // receive all input values from the form
    $vehicle_id = esc($_POST['vehicle_id']);
    $user_id = $_SESSION['user']['id'];

    // Ensure that no user is registered twice.
    // the email should be unique
    $vehicle_check_query = "SELECT * FROM user_vehicles WHERE user_id=$user_id and vehicle_id=$vehicle_id LIMIT 1";

    $result = mysqli_query($conn, $vehicle_check_query);
    $user_vehicle = mysqli_fetch_assoc($result);

    if ($user_vehicle) { // if user exists
        $errors[] = "Vehicle already reserved";
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO user_vehicles (user_id, vehicle_id, created_at, updated_at) 
					  VALUES($user_id, $vehicle_id, now(), now())";
        mysqli_query($conn, $query);
        $message = "Vehicle successfully reserved";
        header('location: ' . BASE_URL . 'user_vehicles.php');
        exit(0);
    }
}