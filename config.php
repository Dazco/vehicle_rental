<?php
session_start();

require 'database/connection.php';

define ('ROOT_PATH', realpath(dirname(__FILE__)));
const BASE_URL = 'http://vehicle.test/';