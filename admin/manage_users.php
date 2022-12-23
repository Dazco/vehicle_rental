<?php require_once('../config.php') ?>
<?php require_once('scripts/helpers.php') ?>
<?php require_once(ROOT_PATH . '/admin/includes/header.php') ?>

<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
<?php require_once(ROOT_PATH . '/includes/errors.php') ?>

<?php $users = getUsers(); ?>
<div class="main-container">
    <div class="main row">
        <?php require_once "includes/sidebar.php" ?>
        <div class="main-content-section col-md-10">
            <div class="d-flex justify-content-between">
                <h2 class="">All Users</h2>
            </div>
            <div class="users-list-table">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $index => $user): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1 ?></th>
                        <td><?php echo ucwords($user['name']) ?></td>
                        <td><?php echo ucwords($user['email']) ?></td>
                        <td><a class="delete-icon" href="#" onclick=""><img src="/img/delete.svg" alt=""></a></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>
