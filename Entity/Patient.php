<?php

namespace Vmc\PatientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vmc\PatientBundle\Model\PatientInterface;

/**
 * Patient
 */
class Patient implements PatientInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $no_rm;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $alamat;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var \DateTime
     */
    private $birth_date;

    /**
     * @var string
     */
    private $addtional_info;

    /**
     * @var boolean
     */
    private $is_delete;

    /**
     * @var boolean
     */
    private $is_diabet;

    /**
     * @var string
     */
    private $diabet_info;

    /**
     * @var boolean
     */
    private $is_blood_issue;

    /**
     * @var string
     */
    private $blood_issue_info;

    /**
     * @var boolean
     */
    private $is_hiv;

    /**
     * @var string
     */
    private $hiv_info;

    /**
     * @var boolean
     */
    private $is_hipertensi;

    /**
     * @var string
     */
    private $hipertensi_info;

    /**
     * @var boolean
     */
    private $is_alergy;

    /**
     * @var string
     */
    private $alergy_info;

    /**
     * @var boolean
     */
    private $is_others;

    /**
     * @var string
     */
    private $others_info;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set noRm
     *
     * @param string $noRm
     *
     * @return Patient
     */
    public function setNoRm($noRm)
    {
        $this->no_rm = $noRm;

        return $this;
    }

    /**
     * Get noRm
     *
     * @return string
     */
    public function getNoRm()
    {
        return $this->no_rm;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alamat
     *
     * @param string $alamat
     *
     * @return Patient
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * Get alamat
     *
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Patient
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Patient
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Patient
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set addtionalInfo
     *
     * @param string $addtionalInfo
     *
     * @return Patient
     */
    public function setAddtionalInfo($addtionalInfo)
    {
        $this->addtional_info = $addtionalInfo;

        return $this;
    }

    /**
     * Get addtionalInfo
     *
     * @return string
     */
    public function getAddtionalInfo()
    {
        return $this->addtional_info;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return Patient
     */
    public function setIsDelete($isDelete)
    {
        $this->is_delete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete()
    {
        return $this->is_delete;
    }

    /**
     * Set isDiabet
     *
     * @param boolean $isDiabet
     *
     * @return Patient
     */
    public function setIsDiabet($isDiabet)
    {
        $this->is_diabet = $isDiabet;

        return $this;
    }

    /**
     * Get isDiabet
     *
     * @return boolean
     */
    public function getIsDiabet()
    {
        return $this->is_diabet;
    }

    /**
     * Set diabetInfo
     *
     * @param string $diabetInfo
     *
     * @return Patient
     */
    public function setDiabetInfo($diabetInfo)
    {
        $this->diabet_info = $diabetInfo;

        return $this;
    }

    /**
     * Get diabetInfo
     *
     * @return string
     */
    public function getDiabetInfo()
    {
        return $this->diabet_info;
    }

    /**
     * Set isBloodIssue
     *
     * @param boolean $isBloodIssue
     *
     * @return Patient
     */
    public function setIsBloodIssue($isBloodIssue)
    {
        $this->is_blood_issue = $isBloodIssue;

        return $this;
    }

    /**
     * Get isBloodIssue
     *
     * @return boolean
     */
    public function getIsBloodIssue()
    {
        return $this->is_blood_issue;
    }

    /**
     * Set bloodIssueInfo
     *
     * @param string $bloodIssueInfo
     *
     * @return Patient
     */
    public function setBloodIssueInfo($bloodIssueInfo)
    {
        $this->blood_issue_info = $bloodIssueInfo;

        return $this;
    }

    /**
     * Get bloodIssueInfo
     *
     * @return string
     */
    public function getBloodIssueInfo()
    {
        return $this->blood_issue_info;
    }

    /**
     * Set isHiv
     *
     * @param boolean $isHiv
     *
     * @return Patient
     */
    public function setIsHiv($isHiv)
    {
        $this->is_hiv = $isHiv;

        return $this;
    }

    /**
     * Get isHiv
     *
     * @return boolean
     */
    public function getIsHiv()
    {
        return $this->is_hiv;
    }

    /**
     * Set hivInfo
     *
     * @param string $hivInfo
     *
     * @return Patient
     */
    public function setHivInfo($hivInfo)
    {
        $this->hiv_info = $hivInfo;

        return $this;
    }

    /**
     * Get hivInfo
     *
     * @return string
     */
    public function getHivInfo()
    {
        return $this->hiv_info;
    }

    /**
     * Set isHipertensi
     *
     * @param boolean $isHipertensi
     *
     * @return Patient
     */
    public function setIsHipertensi($isHipertensi)
    {
        $this->is_hipertensi = $isHipertensi;

        return $this;
    }

    /**
     * Get isHipertensi
     *
     * @return boolean
     */
    public function getIsHipertensi()
    {
        return $this->is_hipertensi;
    }

    /**
     * Set hipertensiInfo
     *
     * @param string $hipertensiInfo
     *
     * @return Patient
     */
    public function setHipertensiInfo($hipertensiInfo)
    {
        $this->hipertensi_info = $hipertensiInfo;

        return $this;
    }

    /**
     * Get hipertensiInfo
     *
     * @return string
     */
    public function getHipertensiInfo()
    {
        return $this->hipertensi_info;
    }

    /**
     * Set isAlergy
     *
     * @param boolean $isAlergy
     *
     * @return Patient
     */
    public function setIsAlergy($isAlergy)
    {
        $this->is_alergy = $isAlergy;

        return $this;
    }

    /**
     * Get isAlergy
     *
     * @return boolean
     */
    public function getIsAlergy()
    {
        return $this->is_alergy;
    }

    /**
     * Set alergyInfo
     *
     * @param string $alergyInfo
     *
     * @return Patient
     */
    public function setAlergyInfo($alergyInfo)
    {
        $this->alergy_info = $alergyInfo;

        return $this;
    }

    /**
     * Get alergyInfo
     *
     * @return string
     */
    public function getAlergyInfo()
    {
        return $this->alergy_info;
    }

    /**
     * Set isOthers
     *
     * @param boolean $isOthers
     *
     * @return Patient
     */
    public function setIsOthers($isOthers)
    {
        $this->is_others = $isOthers;

        return $this;
    }

    /**
     * Get isOthers
     *
     * @return boolean
     */
    public function getIsOthers()
    {
        return $this->is_others;
    }

    /**
     * Set othersInfo
     *
     * @param string $othersInfo
     *
     * @return Patient
     */
    public function setOthersInfo($othersInfo)
    {
        $this->others_info = $othersInfo;

        return $this;
    }

    /**
     * Get othersInfo
     *
     * @return string
     */
    public function getOthersInfo()
    {
        return $this->others_info;
    }
}

