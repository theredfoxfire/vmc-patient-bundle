<?php

namespace Vmc\PatientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PatientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('no_rm')
            ->add('name')
            ->add('alamat')
            ->add('phone')
            ->add('gender')
            ->add('birth_date')
            ->add('addtional_info')
            ->add('is_delete')
            ->add('is_diabet')
            ->add('diabet_info')
            ->add('is_blood_issue')
            ->add('blood_issue_info')
            ->add('is_hiv')
            ->add('hiv_info')
            ->add('is_hipertensi')
            ->add('hipertensi_info')
            ->add('is_alergy')
            ->add('alergy_info')
            ->add('is_others')
            ->add('others_info')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vmc\PatientBundle\Entity\Patient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vmc_patientbundle_patient';
    }
}
