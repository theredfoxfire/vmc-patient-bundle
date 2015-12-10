<?php

namespace Vmc\PatientBundle\Handler;

use Vmc\PatientBundle\Model\PatientInterface;

interface PatientHandlerInterface
{
    /**
     * Get a Patient given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return PatientInterface
     */
    public function get($id);

    /**
     * Get a list of Patients.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0);

    /**
     * Post Patient, creates a new Patient.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return PatientInterface
     */
    public function post(array $parameters);

    /**
     * Edit a Patient.
     *
     * @api
     *
     * @param PatientInterface   $patient
     * @param array           $parameters
     *
     * @return PatientInterface
     */
    public function put(PatientInterface $patient, array $parameters);

    /**
     * Partially update a Patient.
     *
     * @api
     *
     * @param PatientInterface   $patient
     * @param array           $parameters
     *
     * @return PatientInterface
     */
    public function patch(PatientInterface $patient, array $parameters);
}
