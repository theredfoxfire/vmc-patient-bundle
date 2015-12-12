<?php

namespace Vmc\PatientBundle\Model;

Interface PatientInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set noRm
     *
     * @param string $noRm
     *
     * @return Patient
     */
    public function setNoRm($noRm);

    /**
     * Get noRm
     *
     * @return string
     */
    public function getNoRm();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set alamat
     *
     * @param string $alamat
     *
     * @return Patient
     */
    public function setAlamat($alamat);

    /**
     * Get alamat
     *
     * @return string
     */
    public function getAlamat();

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Patient
     */
    public function setPhone($phone);

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Patient
     */
    public function setGender($gender);

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender();

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Patient
     */
    public function setBirthDate($birthDate);

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate();

    /**
     * Set addtionalInfo
     *
     * @param string $addtionalInfo
     *
     * @return Patient
     */
    public function setAddtionalInfo($addtionalInfo);

    /**
     * Get addtionalInfo
     *
     * @return string
     */
    public function getAddtionalInfo();

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return Patient
     */
    public function setIsDelete($isDelete);

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete();

    /**
     * Set isDiabet
     *
     * @param boolean $isDiabet
     *
     * @return Patient
     */
    public function setIsDiabet($isDiabet);

    /**
     * Get isDiabet
     *
     * @return boolean
     */
    public function getIsDiabet();

    /**
     * Set diabetInfo
     *
     * @param string $diabetInfo
     *
     * @return Patient
     */
    public function setDiabetInfo($diabetInfo);

    /**
     * Get diabetInfo
     *
     * @return string
     */
    public function getDiabetInfo();

    /**
     * Set isBloodIssue
     *
     * @param boolean $isBloodIssue
     *
     * @return Patient
     */
    public function setIsBloodIssue($isBloodIssue);

    /**
     * Get isBloodIssue
     *
     * @return boolean
     */
    public function getIsBloodIssue();

    /**
     * Set bloodIssueInfo
     *
     * @param string $bloodIssueInfo
     *
     * @return Patient
     */
    public function setBloodIssueInfo($bloodIssueInfo);

    /**
     * Get bloodIssueInfo
     *
     * @return string
     */
    public function getBloodIssueInfo();

    /**
     * Set isHiv
     *
     * @param boolean $isHiv
     *
     * @return Patient
     */
    public function setIsHiv($isHiv);

    /**
     * Get isHiv
     *
     * @return boolean
     */
    public function getIsHiv();

    /**
     * Set hivInfo
     *
     * @param string $hivInfo
     *
     * @return Patient
     */
    public function setHivInfo($hivInfo);

    /**
     * Get hivInfo
     *
     * @return string
     */
    public function getHivInfo();

    /**
     * Set isHipertensi
     *
     * @param boolean $isHipertensi
     *
     * @return Patient
     */
    public function setIsHipertensi($isHipertensi);

    /**
     * Get isHipertensi
     *
     * @return boolean
     */
    public function getIsHipertensi();

    /**
     * Set hipertensiInfo
     *
     * @param string $hipertensiInfo
     *
     * @return Patient
     */
    public function setHipertensiInfo($hipertensiInfo);

    /**
     * Get hipertensiInfo
     *
     * @return string
     */
    public function getHipertensiInfo();

    /**
     * Set isAlergy
     *
     * @param boolean $isAlergy
     *
     * @return Patient
     */
    public function setIsAlergy($isAlergy);

    /**
     * Get isAlergy
     *
     * @return boolean
     */
    public function getIsAlergy();

    /**
     * Set alergyInfo
     *
     * @param string $alergyInfo
     *
     * @return Patient
     */
    public function setAlergyInfo($alergyInfo);

    /**
     * Get alergyInfo
     *
     * @return string
     */
    public function getAlergyInfo();

    /**
     * Set isOthers
     *
     * @param boolean $isOthers
     *
     * @return Patient
     */
    public function setIsOthers($isOthers);

    /**
     * Get isOthers
     *
     * @return boolean
     */
    public function getIsOthers();

    /**
     * Set othersInfo
     *
     * @param string $othersInfo
     *
     * @return Patient
     */
    public function setOthersInfo($othersInfo);

    /**
     * Get othersInfo
     *
     * @return string
     */
    public function getOthersInfo();
}
