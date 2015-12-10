<?php

namespace Vmc\PatientBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Vmc\PatientBundle\Model\PatientInterface;
use Vmc\PatientBundle\Form\PatientType;
use Vmc\PatientBundle\Exception\InvalidFormException;

class PatientHandler implements PatientHandlerInterface
{
    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;

    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    /**
     * Get a Patient.
     *
     * @param mixed $id
     *
     * @return PatientInterface
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get a list of Patients.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Create a new Patient.
     *
     * @param array $parameters
     *
     * @return PatientInterface
     */
    public function post(array $parameters)
    {
        $patient = $this->createPatient();

        return $this->processForm($patient, $parameters, 'POST');
    }

    /**
     * Edit a Patient.
     *
     * @param PatientInterface $patient
     * @param array         $parameters
     *
     * @return PatientInterface
     */
    public function put(PatientInterface $patient, array $parameters)
    {
        return $this->processForm($patient, $parameters, 'PUT');
    }

    /**
     * Partially update a Patient.
     *
     * @param PatientInterface $patient
     * @param array         $parameters
     *
     * @return PatientInterface
     */
    public function patch(PatientInterface $patient, array $parameters)
    {
        return $this->processForm($patient, $parameters, 'PATCH');
    }

    /**
     * Processes the form.
     *
     * @param PatientInterface $patient
     * @param array         $parameters
     * @param String        $method
     *
     * @return PatientInterface
     *
     * @throws \Vmc\PatientBundle\Exception\InvalidFormException
     */
    private function processForm(PatientInterface $patient, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new PatientType(), $patient, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $patient = $form->getData();
            $this->om->persist($patient);
            $this->om->flush($patient);

            return $patient;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }

    private function createPatient()
    {
        return new $this->entityClass();
    }

}
