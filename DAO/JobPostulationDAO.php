<?php

namespace DAO;

use \Exception as Exception;
use DAO\IJobPostulationDAO as IJobPostulationDAO;
use DAO\JobPositionDAO as JobPositionDAO;
use DAO\Connection as Connection;
use Models\JobPostulation as JobPostulation;
use Models\JobOffer as JobOffer;
use Models\Student as Student;
use Models\Company as Company;

class JobPostulationDAO implements IJobPostulationDAO
{
    private $connection;
    private $tableName = "job_postulations";
    private $jobPositionDAO;

    public function __construct()
    {        
        $this->jobPositionDAO = new JobPositionDAO();
    }

    /**
     * Recibe los datos de una postulación y la agrega a la base de datos.
     */
    function Add(JobPostulation $jobPostulation)
    {



        try {
            if ($this->IsPostulated($jobPostulation->getStudent()->getStudentId()) == true) {
                throw new Exception("El alumno ya se encuentra postulado a una oferta de trabajo.");
            }

            $query = "INSERT INTO " . $this->tableName . " (jobOfferId, studentId, comment, cvarchive, active) VALUES (:jobOfferId, :studentId, :comment, :cvarchive, :active);";

            
            $parameters["jobOfferId"] = $jobPostulation->getJobOffer()->getJobOfferId();
            $parameters["studentId"] = $jobPostulation->getStudent()->getStudentId();
            $parameters["comment"] = $jobPostulation->getComment();
            $parameters["cvarchive"] = $jobPostulation->getCvarchive()['name'];
            $parameters["active"] = $jobPostulation->getActive();


            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Recibe el ID de un usuario estudiante y verifica si ya está postulado a una propuesta laboral.
     * Devuelve false en caso de no estar postulado, true en caso contrario.
     */
    function IsPostulated($studentId)
    {
        $response = false;

        try {

            $query = "SELECT * FROM " . $this->tableName . " WHERE `studentId` = :studentId";
            $parameters["studentId"] = $studentId;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            //Si se encuentra postulacion activa cambia la respuesta a true
            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    if ($row['active'] == true) {
                        $response = true;
                    }
                }
            }


            return $response;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Busca si el alumno ya se encuentra postulado a una oferta laboral y retorna el ID de la oferta laboral a la cual se encuentra postulado.
     */
    public function isPostulatedToSpecificOffer($studentId)
    {
        $response = -1;

        try {
            $query = "SELECT * FROM " . $this->tableName . " WHERE `studentId` = :studentId";
            $parameters["studentId"] = $studentId;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    if ($row['active'] == true) {
                        $response = $row['jobOfferId'];
                    }
                }
            }

            return $response;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function Remove($jobOfferId, $studentId)
    {
        try {
            $query = "UPDATE " . $this->tableName . " SET active = 0 WHERE jobOfferId = :jobOfferId AND studentId = :studentId";
            $parameters["jobOfferId"] = $jobOfferId;
            $parameters["studentId"] = $studentId;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAllByStudentId($studentId)
    {
        $jobPostulationsList = array();        
        try {
            $query = "CALL get_postulations_by_student_id(?)";
            $parameters["?"] = $studentId;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);            
            
            foreach($resultSet as $row) {
                $jobPostulation = new JobPostulation();
                $student = new Student();
                $jobOffer = new JobOffer();
                $company = new Company();
                $jobPosition = $this->jobPositionDAO->GetById($row['jobPositionId']);                


                // Mapeo ID Student - El resto viene de la api en el controlador.
                $student->setStudentId($row["studentId"]);

                // Mapeo Company
                $company->setCompanyId($row["companyId"]);
                $company->setName($row["name"]);
                $company->setEmail($row["email"]);
                $company->setPhone($row["phone"]);
                $company->setAddress($row["address"]);
                $company->setCuit($row["cuit"]);
                $company->setWebsite($row["website"]);
                $company->setFounded($row["founded"]);
                $company->setStatus($row["status"]);


                // Mapeo
                $jobOffer->setJobOfferId($row["jobOfferId"]);
                $jobOffer->setCompany($company);
                $jobOffer->setTitle($row["title"]);
                $jobOffer->setCreatedAt($row["createdAt"]);
                $jobOffer->setExpirationDate($row["expirationDate"]);
                $jobOffer->setSalary($row["salary"]);
                $jobOffer->setJobPosition($jobPosition);
                $jobOffer->setActive($row["jo_active"]);

                $jobPostulation->setPostulationId($row['idjob_postulations']);                
                $jobPostulation->setStudent($student);
                $jobPostulation->setJobOffer($jobOffer);
                $jobPostulation->setComment($row['comment']);
                $jobPostulation->setCvarchive($row['cvarchive']);
                $jobPostulation->setActive($row['jp_active']);                

                array_push($jobPostulationsList, $jobPostulation);
            }            

            return array_reverse($jobPostulationsList);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
