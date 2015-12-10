<?php

namespace Vmc\PatientBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Vmc\PatientBundle\Exception\InvalidFormException;
use Vmc\PatientBundle\Form\PatientType;
use Vmc\PatientBundle\Model\PatientInterface;


class PatientController extends FOSRestController
{
    /**
     * List all patients.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing patients.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many patients to return.")
     *
     * @Annotations\View(
     *  templateVar="patients"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getPatientsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get('ais_patient.patient.handler')->all($limit, $offset);
    }

    /**
     * Get single Patient.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Patient for a given id",
     *   output = "Vmc\PatientBundle\Entity\Patient",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the patient is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="patient")
     *
     * @param int     $id      the patient id
     *
     * @return array
     *
     * @throws NotFoundHttpException when patient not exist
     */
    public function getPatientAction($id)
    {
        $patient = $this->getOr404($id);

        return $patient;
    }

    /**
     * Presents the form to use to create a new patient.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  templateVar = "form"
     * )
     *
     * @return FormTypeInterface
     */
    public function newPatientAction()
    {
        return $this->createForm(new PatientType());
    }
    
    /**
     * Presents the form to use to edit patient.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "VmcPatientBundle:Patient:editPatient.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the patient id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when patient not exist
     */
    public function editPatientAction($id)
    {
		$patient = $this->getPatientAction($id);
		
        return array('form' => $this->createForm(new PatientType(), $patient), 'patient' => $patient);
    }

    /**
     * Create a Patient from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new patient from the submitted data.",
     *   input = "Vmc\PatientBundle\Form\PatientType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "VmcPatientBundle:Patient:newPatient.html.twig",
     *  statusCode = Codes::HTTP_BAD_REQUEST,
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postPatientAction(Request $request)
    {
        try {
            $newPatient = $this->container->get('ais_patient.patient.handler')->post(
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $newPatient->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_patient', $routeOptions, Codes::HTTP_CREATED);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing patient from the submitted data or create a new patient at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Vmc\PatientBundle\Form\PatientType",
     *   statusCodes = {
     *     201 = "Returned when the Patient is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "VmcPatientBundle:Patient:editPatient.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the patient id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when patient not exist
     */
    public function putPatientAction(Request $request, $id)
    {
        try {
            if (!($patient = $this->container->get('ais_patient.patient.handler')->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $patient = $this->container->get('ais_patient.patient.handler')->post(
                    $request->request->all()
                );
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $patient = $this->container->get('ais_patient.patient.handler')->put(
                    $patient,
                    $request->request->all()
                );
            }

            $routeOptions = array(
                'id' => $patient->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_patient', $routeOptions, $statusCode);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing patient from the submitted data or create a new patient at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "Vmc\PatientBundle\Form\PatientType",
     *   statusCodes = {
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "VmcPatientBundle:Patient:editPatient.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the patient id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when patient not exist
     */
    public function patchPatientAction(Request $request, $id)
    {
        try {
            $patient = $this->container->get('ais_patient.patient.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $patient->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_patient', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Fetch a Patient or throw an 404 Exception.
     *
     * @param mixed $id
     *
     * @return PatientInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($patient = $this->container->get('ais_patient.patient.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $patient;
    }
    
    public function postUpdatePatientAction(Request $request, $id)
    {
		try {
            $patient = $this->container->get('ais_patient.patient.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $patient->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_patient', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
	}
}
