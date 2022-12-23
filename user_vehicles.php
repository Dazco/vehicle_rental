<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/header.php') ?>
<?php require_once(ROOT_PATH . '/scripts/helpers.php') ?>
<?php $vehicles = getUserVehicles(); ?>

<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
<?php require_once(ROOT_PATH . '/includes/errors.php') ?>
<?php require_once(ROOT_PATH . '/includes/message.php') ?>
    <div class="main-container">
        <div class="main row">
            <div class="filters-section col-md-3">
                <div class="heading">
                    <span>My Reserved Vehicles</span>
                </div>
                <div class="count"><span><?php echo count($vehicles) ?> Entries</span></div>
                <div class="filters">
                    <div class="filters-title">Filter By</div>
                    <div class="filter-type">
                        <div class="filter-type--heading"><span>Car type</span></div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Compact</div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Standard</div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Premium</div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Luxury</div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> SUV</div>
                    </div>
                    <div class="filter-type">
                        <div class="filter-type--heading"><span>Capacity</span></div>
                        <div class="filter-type--option"><input type="checkbox" name="capacity"/> 2-4 Passengers</div>
                        <div class="filter-type--option"><input type="checkbox" name="capacity"/> 5-7 Passengers</div>
                    </div>
                    <div class="filter-type">
                        <div class="filter-type--heading"><span>Specification</span></div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Automatic</div>
                        <div class="filter-type--option"><input type="checkbox" name="carType"/> Manual</div>
                    </div>
                </div>
            </div>
            <div class="main-content-section col-md-9">
                <?php if (count($vehicles)): ?>
                    <div class="vehicles-list">
                        <?php foreach ($vehicles

                                       as $vehicle): ?>
                            <div class="vehicles-single row">
                                <div class="vehicle-image col-md-4">
                                    <img src="/img/car6.png" alt="Vehicle Image">
                                </div>
                                <div class="vehicle-info col-md-6">
                                    <div class="info--title"><span><?php echo ucwords($vehicle['name']) ?></span></div>
                                    <div class="info--type"><span><?php echo ucfirst($vehicle['type']) ?></span></div>
                                    <div class="info--features row">
                                        <div class="col-md-6"><img
                                                    src="/img/automatic-icon.svg"/> <?php echo ucwords($vehicle['passengers']) ?>
                                            Passengers
                                        </div>
                                        <div class="col-md-6"><img
                                                    src="/img/automatic-icon.svg"/> <?php echo ucfirst($vehicle['transmission']) ?>
                                        </div>
                                        <?php if ($vehicle['unlimited_mileage']): ?>
                                            <div class="col-md-6"><img src="/img/mileage-icon.svg"/> Unlimited Mileage
                                            </div>
                                        <?php endif ?>
                                        <?php if ($vehicle['unlimited_mileage']): ?>
                                            <div class="col-md-6"><img src="/img/ac-icon.svg"/> Air Conditioning</div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-md-2 vehicle-actions">
                                    <div class="info--price">
                                        <span class="info--amt">$<?php echo $vehicle['price'] ?></span><span
                                                class="info--per">/per day</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mt-3"> You haven't reserved any vehicles yet.</div>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php include(ROOT_PATH . '/includes/footer.php') ?>