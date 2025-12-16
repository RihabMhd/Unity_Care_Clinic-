<?php

namespace Controllers;

use Models\Doctor;
use Models\Department;
require_once "./modules/departments/Department.php";
require_once "./modules/doctors/Doctor.php";

class DoctorsController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $doctor = new Doctor($this->db);
        $doctors = $doctor->readAllDoctors();
        include "./views/doctors/list.php";
    }

    public function create()
    {
        $departmentModel = new Department($this->db);
        $departments = $departmentModel->readAllDepartment();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $doctor = new Doctor($this->db);

            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone_number']);

            $errors = [];

            if (empty($first_name)) {
                $errors[] = "First name is required.";
            }

            if (empty($last_name)) {
                $errors[] = "Last name is required.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email address.";
            }

            if (!preg_match("/^[0-9]{10}$/", $phone)) {
                $errors[] = "Phone number must be 10 digits.";
            }

    
            if (!empty($errors)) {
                include("./views/doctors/create.php");
                return; 
            }
         
  
            $doctor->first_name = $first_name;
            $doctor->last_name = $last_name;
            $doctor->specialization = trim($_POST['specialization']);
            $doctor->department_id = trim($_POST['department_id']);
            $doctor->phone_number = $phone;
            $doctor->email = $email;

            if ($doctor->createDoctor()) {
                header("LOCATION: index.php?controller=doctors&success=1");
                exit;
            } else {
                $error = "Failed to create doctor";
            }
        }

        include("./views/doctors/create.php");
    }

    public function edit($id)
    {
        $doctor = new Doctor($this->db);
        $doctor->doctor_id = $id;
        $departmentModel = new Department($this->db);
        $departments = $departmentModel->readAllDepartment();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $doctor->first_name = trim($_POST['first_name']);
            $doctor->last_name = trim($_POST['last_name']);
            $doctor->specialization = trim($_POST['specialization']);
            $doctor->department_id = trim($_POST['department_id']);
            $doctor->phone_number = trim($_POST['phone_number']);
            $doctor->email = trim($_POST['email']);

            if ($doctor->updatedoctor()) {
                header("LOCATION: index.php?controller=doctors&success=1");
                exit;
            } else {
                $error = "Failed to update doctor";
            }
        }

        $data = $doctor->readOneDoctors();
        include("./views/doctors/edit.php");
    }

    public function delete($id)
    {
        $doctor = new Doctor($this->db);
        $doctor->doctor_id = $id;

        if ($doctor->deleteDoctor()) {
            header("LOCATION: index.php");
        } else {
            header("LOCATION: index.php?error=delete_failed");
        }
        exit;
    }
}
