<?php

namespace Vmc\PatientBundle\Tests\Fixtures\Entity;

use Vmc\PatientBundle\Entity\Patient;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadPatientData implements FixtureInterface
{
    static public $patients = array();

    public function load(ObjectManager $manager)
    {
        $patient = new Patient();
        $patient->setTitle('title');
        $patient->setBody('body');

        $manager->persist($patient);
        $manager->flush();

        self::$patients[] = $patient;
    }
}
