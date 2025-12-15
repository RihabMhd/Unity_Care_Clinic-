<?php

namespace Models;

class Patient
{
    private $conn;

    private $table_name = "patients";

    public $patient_id;
    public $first_name;
    public $last_name;
    public $gender;
    public $address;
    public $date_of_birth;
    public $phone_number;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAllPatient()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function readOnePatient()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE patient_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->patient_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createPatient()
    {
        $query = "INSERT INTO " . $this->table_name . " (first_name, last_name, gender, address, date_of_birth, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssss",
            $this->first_name,
            $this->last_name,
            $this->gender,
            $this->address,
            $this->date_of_birth,
            $this->phone_number,
            $this->email
        );
        return $stmt->execute();
    }

    public function updatePatient()
    {
        $query = "UPDATE " . $this->table_name . " SET first_name=?, last_name=?, gender=?, address=?, date_of_birth=?, phone_number=?, email=? WHERE patient_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssssi",
            $this->first_name,
            $this->last_name,
            $this->gender,
            $this->address,
            $this->date_of_birth,
            $this->phone_number,
            $this->email,
            $this->patient_id
        );
        return $stmt->execute();
    }

    public function deletePatient()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE patient_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "i",
            $this->patient_id
        );
        return $stmt->execute();
    }
}
