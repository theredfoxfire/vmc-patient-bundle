<?php

namespace Vmc\PatientBundle\Tests\Handler;

use Vmc\PatientBundle\Handler\PatientHandler;
use Vmc\PatientBundle\Model\PatientInterface;
use Vmc\PatientBundle\Entity\Patient;

class PatientHandlerTest extends \PHPUnit_Framework_TestCase
{
    const DOSEN_CLASS = 'Vmc\PatientBundle\Tests\Handler\DummyPatient';

    /** @var PatientHandler */
    protected $patientHandler;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $om;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $repository;

    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }
        
        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');

        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($this->repository));
        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($class));
        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::DOSEN_CLASS));
    }


    public function testGet()
    {
        $id = 1;
        $patient = $this->getPatient();
        $this->repository->expects($this->once())->method('find')
            ->with($this->equalTo($id))
            ->will($this->returnValue($patient));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $this->patientHandler->get($id);
    }

    public function testAll()
    {
        $offset = 1;
        $limit = 2;

        $patients = $this->getPatients(2);
        $this->repository->expects($this->once())->method('findBy')
            ->with(array(), null, $limit, $offset)
            ->will($this->returnValue($patients));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $all = $this->patientHandler->all($limit, $offset);

        $this->assertEquals($patients, $all);
    }

    public function testPost()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $patient = $this->getPatient();
        $patient->setTitle($title);
        $patient->setBody($body);

        $form = $this->getMock('Vmc\PatientBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($patient));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $patientObject = $this->patientHandler->post($parameters);

        $this->assertEquals($patientObject, $patient);
    }

    /**
     * @expectedException Vmc\PatientBundle\Exception\InvalidFormException
     */
    public function testPostShouldRaiseException()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $patient = $this->getPatient();
        $patient->setTitle($title);
        $patient->setBody($body);

        $form = $this->getMock('Vmc\PatientBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(false));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $this->patientHandler->post($parameters);
    }

    public function testPut()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $patient = $this->getPatient();
        $patient->setTitle($title);
        $patient->setBody($body);

        $form = $this->getMock('Vmc\PatientBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($patient));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $patientObject = $this->patientHandler->put($patient, $parameters);

        $this->assertEquals($patientObject, $patient);
    }

    public function testPatch()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('body' => $body);

        $patient = $this->getPatient();
        $patient->setTitle($title);
        $patient->setBody($body);

        $form = $this->getMock('Vmc\PatientBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($patient));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->patientHandler = $this->createPatientHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $patientObject = $this->patientHandler->patch($patient, $parameters);

        $this->assertEquals($patientObject, $patient);
    }


    protected function createPatientHandler($objectManager, $patientClass, $formFactory)
    {
        return new PatientHandler($objectManager, $patientClass, $formFactory);
    }

    protected function getPatient()
    {
        $patientClass = static::DOSEN_CLASS;

        return new $patientClass();
    }

    protected function getPatients($maxPatients = 5)
    {
        $patients = array();
        for($i = 0; $i < $maxPatients; $i++) {
            $patients[] = $this->getPatient();
        }

        return $patients;
    }
}

class DummyPatient extends Patient
{
}
