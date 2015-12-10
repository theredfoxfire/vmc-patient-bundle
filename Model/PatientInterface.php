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
     * Set noPatient
     *
     * @param string $noPatient
     *
     * @return Patient
     */
    public function setNoPatient($noPatient);

    /**
     * Get noPatient
     *
     * @return string
     */
    public function getNoPatient();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
     */
    public function setNama($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getNama();

    /**
     * Set nameSingkat
     *
     * @param string $nameSingkat
     *
     * @return Patient
     */
    public function setNamaSingkat($nameSingkat);

    /**
     * Get nameSingkat
     *
     * @return string
     */
    public function getNamaSingkat();

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Patient
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

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
     * Set tempatLahir
     *
     * @param string $tempatLahir
     *
     * @return Patient
     */
    public function setTempatLahir($tempatLahir);

    /**
     * Get tempatLahir
     *
     * @return string
     */
    public function getTempatLahir();

    /**
     * Set tanggalLahir
     *
     * @param \DateTime $tanggalLahir
     *
     * @return Patient
     */
    public function setTanggalLahir($tanggalLahir);

    /**
     * Get tanggalLahir
     *
     * @return \DateTime
     */
    public function getTanggalLahir();

    /**
     * Set agama
     *
     * @param string $agama
     *
     * @return Patient
     */
    public function setAgama($agama);

    /**
     * Get agama
     *
     * @return string
     */
    public function getAgama();

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
     * Set provinsiId
     *
     * @param integer $provinsiId
     *
     * @return Patient
     */
    public function setProvinsiId($provinsiId);

    /**
     * Get provinsiId
     *
     * @return integer
     */
    public function getProvinsiId();

    /**
     * Set kabupatenId
     *
     * @param integer $kabupatenId
     *
     * @return Patient
     */
    public function setKabupatenId($kabupatenId);

    /**
     * Get kabupatenId
     *
     * @return integer
     */
    public function getKabupatenId();

    /**
     * Set kecamatan
     *
     * @param string $kecamatan
     *
     * @return Patient
     */
    public function setKecamatan($kecamatan);

    /**
     * Get kecamatan
     *
     * @return string
     */
    public function getKecamatan();

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
     * Set pos
     *
     * @param string $pos
     *
     * @return Patient
     */
    public function setPos($pos);

    /**
     * Get pos
     *
     * @return string
     */
    public function getPos();

    /**
     * Set asalSekolah
     *
     * @param string $asalSekolah
     *
     * @return Patient
     */
    public function setAsalSekolah($asalSekolah);

    /**
     * Get asalSekolah
     *
     * @return string
     */
    public function getAsalSekolah();

    /**
     * Set jumlahUn
     *
     * @param string $jumlahUn
     *
     * @return Patient
     */
    public function setJumlahUn($jumlahUn);

    /**
     * Get jumlahUn
     *
     * @return string
     */
    public function getJumlahUn();

    /**
     * Set jurusanSekolah
     *
     * @param string $jurusanSekolah
     *
     * @return Patient
     */
    public function setJurusanSekolah($jurusanSekolah);

    /**
     * Get jurusanSekolah
     *
     * @return string
     */
    public function getJurusanSekolah();
    
        /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Patient
     */
    public function setNationality($nationality);

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality();
}
