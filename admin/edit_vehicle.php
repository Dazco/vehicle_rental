<?php require_once('../config.php') ?>
<?php require_once('scripts/helpers.php') ?>
<?php require_once('scripts/manage_vehicle.php') ?>
<?php require_once(ROOT_PATH . '/admin/includes/header.php') ?>

<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
<?php $vehicle = getVehicle($_GET['vehicle_id']); ?>

<div class="main-container">
    <div class="main row">
        <?php require_once "includes/sidebar.php" ?>
        <div class="main-content-section col-md-10">
            <div class="d-flex justify-content-between">
                <h2 class="">Edit Vehicle</h2>
            </div>
            <div class="vehicle-form-wrapper">
                <form class="vehicle-form" action="edit_vehicle.php" method="POST">
                    <?php require_once(ROOT_PATH . '/includes/errors.php') ?>
                    <div class="form-input-group">
                        <label for="name">Name</label>
                        <input required value="<?php echo $vehicle['name'] ?>" type="text" name="name"
                               placeholder="enter vehicle name (e.g Camry XLE)"/>
                    </div>

                    <div class="form-input-group">
                        <label for="price">Price ($/day)</label>
                        <input required value="<?php echo $vehicle['price'] ?>" type="number" name="price"
                               placeholder="enter price per day"/>
                    </div>

                    <div class="form-input-group">
                        <label for="passengers">Passengers</label>
                        <input required value="<?php echo $vehicle['passengers'] ?>" type="number" name="passengers"
                               placeholder="enter number of passengers"/>
                    </div>

                    <div class="form-input-group">
                        <label for="type">Type</label>
                        <input required value="<?php echo $vehicle['type'] ?>" type="text" name="type"
                               placeholder="enter vehicle type (e.g compact, SUV, etc)"/>
                    </div>

                    <div class="form-input-group">
                        <label for="transmission">Transmission</label>
                        <select name="transmission">
                            <option <?php echo $vehicle['transmission'] == 'automatic' ? 'selected' : '' ?>
                                    value="automatic">Automatic
                            </option>
                            <option <?php echo $vehicle['transmission'] == 'manual' ? 'selected' : '' ?> value="manual">Manual</option>
                        </select>
                    </div>

                    <div class="form-input-group">
                        <label for="unlimitedMileage">Unlimited Mileage</label>
                        <select name="unlimited_mileage">
                            <option <?php echo $vehicle['unlimited_mileage'] ? 'selected' : '' ?> value="yes">YES</option>
                            <option <?php echo !$vehicle['unlimited_mileage'] ? 'selected' : '' ?> value="no">NO</option>
                        </select>
                    </div>

                    <div class="form-input-group">
                        <label for="ac">Air Conditioning</label>
                        <select name="air_conditioning">
                            <option <?php echo $vehicle['air_conditioning'] ? 'selected' : '' ?> value="yes">YES</option>
                            <option <?php echo !$vehicle['air_conditioning'] ? 'selected' : '' ?> value="no">NO</option>
                        </select>
                    </div>

                    <div class="form-submit">
                        <input name="edit_vehicle" type="submit" class="button-forms button-red" value="UPDATE ENTRY"/>
                    </div>
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['id'] ?>">

                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
