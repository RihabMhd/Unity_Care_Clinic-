<?php

namespace Controllers;

use Models\Patient;

require_once "./modules/departments/Department.php";

class DepartmentsControllerController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

   
}
