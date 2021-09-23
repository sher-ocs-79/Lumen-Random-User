<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity
 */
class Customers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=32, nullable=false, options={"fixed"=true})
     */
	public $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false, options={"fixed"=true})
     */
	public $password;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=64, nullable=false, options={"fixed"=true})
     */
	public $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=32, nullable=false, options={"fixed"=true})
     */
	public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=16, nullable=false, options={"fixed"=true})
     */
	public $city;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=16, nullable=false, options={"fixed"=true})
     */
	public $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=8, nullable=false, options={"fixed"=true})
     */
	public $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=3, nullable=false, options={"fixed"=true})
     */
	public $country;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
	public $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
	public $updatedAt;

	/**
	 * Customers constructor.
	 * @param array $input
	 */
	public function __construct($input = array())
	{
		if (!empty($input)) {
			$this->setUsername($input['username']);
			$this->setPassword($input['password']);
			$this->setFullname($input['fullname']);
			$this->setEmail($input['email']);
			$this->setCity($input['city']);
			$this->setPhone($input['phone']);
			$this->setGender($input['gender']);
			$this->setCountry($input['country']);
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getFullname()
	{
		return $this->fullname;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function setPassword($password)
	{
		$this->password = md5($password);
	}

	public function setFullname($fullname)
	{
		$this->fullname = $fullname;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}
}
