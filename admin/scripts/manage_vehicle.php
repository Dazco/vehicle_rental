<?php
require_once 'helpers.php';
$message = "";
// ADD VEHICLE
if (isset($_POST['add_vehicle'])) {
    // receive all input values from the form
    $name = esc($_POST['name']);
    $price = esc($_POST['price']);
    $passengers = esc($_POST['passengers']);
    $type = esc($_POST['type']);
    $transmission = esc($_POST['transmission']);
    $mileage = $_POST['unlimited_mileage'] == "yes";
    $air_conditioning = $_POST['air_conditioning'] == "yes";

    // register vehicle if there are no errors in the form
    $query = "INSERT INTO vehicles (`name`, `price`, `passengers`, `type`, `transmission`, `unlimited_mileage`, `air_conditioning`, `created_at`, `updated_at`) 
VALUES('$name', $price, $passengers, '$type', '$transmission', $mileage, $air_conditioning, now(), now())";

    $result = mysqli_query($conn, $query);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $message = "Vehicle successfully added";
    header('location: ' . BASE_URL . 'admin/manage_vehicles.php');
    exit(0);
}

if (isset($_POST['edit_vehicle'])) {
    // receive all input values from the form
    $vehicle_id = esc($_POST['vehicle_id']);
    $name = esc($_POST['name']);
    $price = esc($_POST['price']);
    $passengers = esc($_POST['passengers']);
    $type = esc($_POST['type']);
    $transmission = esc($_POST['transmission']);
    $mileage = $_POST['unlimited_mileage'] == "yes";
    $air_conditioning = $_POST['air_conditioning'] == "yes";

    // register vehicle if there are no errors in the form
    $query = "UPDATE vehicles SET `name` = '$name', `price` = $price, `passengers` = $passengers, `type` = '$type', `transmission` = '$transmission', `unlimited_mileage` = $mileage, `air_conditioning` = $air_conditioning, `updated_at` = now() 
                WHERE id = $vehicle_id LIMIT 1";

    $result = mysqli_query($conn, $query);
    $message = "Vehicle successfully updated";
    header('location: ' . BASE_URL . 'admin/manage_vehicles.php');
    exit(0);
}