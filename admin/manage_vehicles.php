<?php require_once('../config.php') ?>
<?php require_once('scripts/helpers.php') ?>
<?php require_once(ROOT_PATH . '/admin/includes/header.php') ?>

<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
<?php require_once(ROOT_PATH . '/includes/errors.php') ?>

<?php $vehicles = getVehicles(); ?>
<div class="main-container">
    <div class="main row">
        <?php require_once "includes/sidebar.php" ?>
        <div class="main-content-section col-md-10">
            <div class="d-flex justify-content-between">
                <h2 class="">All Vehicles</h2>
                <a href="add_vehicle.php">
                    <button class="button-nav button-red">Add New</button>
                </a>
            </div>
            <div class="vehicle-list-table">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price ($/per day)</th>
                        <th scope="col">Passengers</th>
                        <th scope="col">Type</th>
                        <th scope="col">Transmission</th>
                        <th scope="col">Unlimited Mileage</th>
                        <th scope="col">A.C</th>
                        <th scope="col">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($vehicles as $index => $vehicle): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1 ?></th>
                        <td><?php echo ucwords($vehicle['name']) ?></td>
                        <td><?php echo $vehicle['price'] ?></td>
                        <td><?php echo $vehicle['passengers'] ?></td>
                        <td><?php echo ucfirst($vehicle['type']) ?></td>
                        <td><?php echo ucfirst($vehicle['transmission']) ?></td>
                        <td><?php echo $vehicle['unlimited_mileage'] ? 'Yes': 'No' ?></td>
                        <td><?php echo $vehicle['air_conditioning'] ? 'Yes': 'No' ?></td>
                        <td><a href="./edit_vehicle.php?vehicle_id=<?php echo $vehicle['id']?>">View</a>
                            <a class="edit-icon" href="./edit_vehicle.php?vehicle_id=<?php echo $vehicle['id']?>"><img src="/img/edit.svg" alt=""></a>
                            <a class="delete-icon" href="#" onclick=""><img src="/img/delete.svg" alt=""></a></td>
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
