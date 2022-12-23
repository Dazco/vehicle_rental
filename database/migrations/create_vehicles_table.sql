DROP TABLE `vehicles`;
CREATE TABLE `vehicles`
(
    `id`         int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name`   varchar(255) NOT NULL,
    `price` decimal(2) NOT NULL,
    `passengers` int(4) NOT NULL,
    `type`   varchar(255) NOT NULL,
    `transmission`       enum('automatic','manual') DEFAULT 'automatic',
    `unlimited_mileage`   boolean DEFAULT true,
    `air_conditioning`   boolean DEFAULT true,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;