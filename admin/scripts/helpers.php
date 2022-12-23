<?php
/*if (!isAdmin()) {
    header('location: ' . BASE_URL);
    exit(0);
}*/

function getStatistics()
{
    global $conn;
    $statistics = ["users_count" => 0, "vehicles_count" => 0, "reservations_count" => 0];
    $sql = "SELECT (SELECT COUNT(*) FROM users) as users_count, (SELECT COUNT(*) FROM vehicles) as vehicles_count, (SELECT COUNT(*) FROM user_vehicles) as reservations_count";
    $result = mysqli_query($conn, $sql);
    return $result ? mysqli_fetch_assoc($result) : $statistics;
}

function getReservations(): array
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT u.name as user_name, u.email as user_email,
       v.id as vehicle_id, v.name as vehicle_name, v.price as vehicle_price 
       FROM `user_vehicles` as uv 
    LEFT JOIN vehicles as v ON uv.vehicle_id = v.id LEFT JOIN users as u ON uv.user_id = u.id";
    $result = mysqli_query($conn, $sql);
    // fetch all vehicles as an associative array
    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function getVehicles(): array
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM `vehicles`";
    $result = mysqli_query($conn, $sql);

    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function getVehicle(int $vehicle_id): array
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM `vehicles` WHERE id = $vehicle_id";
    $result = mysqli_query($conn, $sql);

    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC)[0] : [];
}

function getUsers(): array
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);

    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function isAdmin(): bool
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';
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