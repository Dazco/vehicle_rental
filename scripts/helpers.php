<?php
/* * * * * * * * * * * * * * *
* Returns all uploaded Vehicles
* * * * * * * * * * * * * * */
function getVehicles(): array
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM `vehicles`";
    $result = mysqli_query($conn, $sql);

    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function getUserVehicles(): array
{
    if(!isLoggedIn()){
        header('location: ' . BASE_URL);
        exit(0);
    }
    // use global $conn object in function
    global $conn;
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `user_vehicles` LEFT JOIN vehicles ON user_vehicles.vehicle_id = vehicles.id WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    // fetch all vehicles as an associative array
    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}

// escape value from form
function esc(String $value): string
{
    // bring the global db connect object into function
    global $conn;

    return mysqli_real_escape_string($conn, trim($value));
}