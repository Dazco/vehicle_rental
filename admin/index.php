<?php require_once('../config.php') ?>
<?php require_once('scripts/helpers.php') ?>
<?php require_once(ROOT_PATH . '/admin/includes/header.php') ?>

<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>

<?php $statistics = getStatistics();
$reservations = getReservations(); ?>
<div class="main-container">
    <div class="main row">
        <?php require_once "includes/sidebar.php"?>
        <div class="main-content-section col-md-10">
            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="stat-counter"><span><?php echo $statistics["users_count"] ?></span></div>
                                <div><img src="/img/dash1.svg" alt="" srcset=""></div>
                            </div>
                            <div class="stat-label"><span>Active Users</span></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="stat-counter"><span><?php echo $statistics["reservations_count"] ?></span>
                                </div>
                                <div><img src="/img/dash1.svg" alt="" srcset=""></div>
                            </div>
                            <div class="stat-label"><span>Reservations</span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="stat-counter"><span><?php echo $statistics["vehicles_count"] ?></span></div>
                                <div><img src="/img/dash1.svg" alt="" srcset=""></div>
                            </div>
                            <div class="stat-label"><span>Total Vehicles</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pending-resv">
                <div class="d-flex justify-content-between">
                    <h3 class="">Reservations</h3>
                </div>
                <div class="vehicle-list-table">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Vehicle ID</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Price ($/day)</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo ucwords($reservation['user_name']) ?></td>
                                <td><?php echo ucwords($reservation['user_email']) ?></td>
                                <td><?php echo ucwords($reservation['vehicle_id']) ?></td>
                                <td><?php echo ucwords($reservation['vehicle_name']) ?></td>
                                <td><?php echo ucwords($reservation['vehicle_price']) ?></td>
                                <td>Reserved</td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</body>

</html>
