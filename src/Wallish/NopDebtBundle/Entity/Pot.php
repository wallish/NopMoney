<?php

namespace Wallish\NopDebtBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pot
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pot
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Wallish\NopDebtBundle\Entity\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="who", type="string", length=255)
     */
    private $who;

    /**
     * @ORM\ManyToOne(targetEntity="Wallish\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date")
     */
    private $dateEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255)
     */
    private $hash;


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
     * Set name
     *
     * @param string $name
     * @return Pot
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
     * Set description
     *
     * @param string $description
     * @return Pot
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set createdBy
     *
     * @param \stdClass $createdBy
     * @return Pot
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \stdClass 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Pot
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return Pot
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set hash
     *
     * @param string $hash
     * @return Pot
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set who
     *
     * @param string $who
     * @return Pot
     */
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Get who
     *
     * @return string 
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set user
     *
     * @param \Wallish\UserBundle\Entity\User $user
     * @return Pot
     */
    public function setUser(\Wallish\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Wallish\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

   

    /**
     * Set event
     *
     * @param \Wallish\NopDebtBundle\Entity\Event $event
     * @return Pot
     */
    public function setEvent(\Wallish\NopDebtBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Wallish\NopDebtBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set userList
     *
     * @param array $userList
     * @return Pot
     */
    public function setUserList($userList)
    {
        $this->userList = $userList;

        return $this;
    }

    /**
     * Get userList
     *
     * @return array 
     */
    public function getUserList()
    {
        return $this->userList;
    }
}
