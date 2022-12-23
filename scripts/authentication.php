<?php
require_once(ROOT_PATH . '/scripts/helpers.php');
// variable declaration
$name = "";
$email = "";
$errors = array();

// REGISTER USER
if (isset($_POST['register'])) {
    // receive all input values from the form
    $name = esc($_POST['name']);
    $email = esc($_POST['email']);
    $password = esc($_POST['password']);

    // form validation: ensure that the form is correctly filled
    if (empty($name)) {
        $errors[] = "Uhmm...We gonna need your name";
    }
    if (empty($email)) {
        $errors[] = "Oops.. Email is missing";
    }
    if (empty($password)) {
        $errors[] = "uh-oh you forgot the password";
    }

    // Ensure that no user is registered twice.
    // the email should be unique
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";

    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            $errors[] = "Email already exists";
        }
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
        $query = "INSERT INTO users (name, email, password, created_at, updated_at) 
					  VALUES('$name', '$email', '$password', now(), now())";
        mysqli_query($conn, $query);

        // get id of created user
        $reg_user_id = mysqli_insert_id($conn);

        // put logged-in user into session array
        $_SESSION['user'] = getUserById($reg_user_id);

        // if user is admin, redirect to admin area
        if (in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
            $_SESSION['message'] = "You are now logged in";
            // redirect to admin area
            header('location: ' . BASE_URL . 'admin/index.php');
        } else {
            $_SESSION['message'] = "You are now logged in";
            // redirect to public area
            header('location: index.php');
        }
        exit(0);
    }
}

// LOG USER IN
if (isset($_POST['login'])) {
    $email = esc($_POST['email']);
    $password = esc($_POST['password']);

    if (empty($email)) {
        $errors[] = "Email required";
    }
    if (empty($password)) {
        $errors[] = "Password required";
    }
    if (empty($errors)) {
        $password = md5($password); // encrypt password
        $sql = "SELECT * FROM users WHERE email='$email' and password='$password' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // get id of created user
            $reg_user_id = mysqli_fetch_assoc($result)['id'];

            // put logged-in user into session array
            $_SESSION['user'] = getUserById($reg_user_id);
            $_SESSION['message'] = "You are now logged in";
            // if user is admin, redirect to admin area
            if (in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
                // redirect to admin area
                header('location: ' . BASE_URL . '/admin/index.php');
            } else {

                // redirect to public area
                header('location: index.php');
            }
            exit(0);
        } else {
            $errors[] = 'Invalid credentials';
        }
    }
}

// Get user info from user id
function getUserById($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: ' . BASE_URL . 'login.php');
    exit(0);
}
?>