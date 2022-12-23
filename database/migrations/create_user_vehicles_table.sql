DROP TABLE `user_vehicles`;
CREATE TABLE `user_vehicles`
(
    `user_id`   int(11) NOT NULL,
    `vehicle_id`   int(11) NOT NULL,
    PRIMARY KEY (`user_id`, `vehicle_id`),
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;