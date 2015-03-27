<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\Bundle\NopDebtBundle\Entity\Account;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

//use Doctrine\Common\Collections\ArrayCollection;

class AccountFixtures extends  AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 10) {
            $category = new Account();
            $category->setDate(new \DateTime('2013-01-15'));
            $category->setDescription('Description');
            $category->setType('type');
            $category->setAmount($faker->randomNumber);
            $category->setHash(uniqid());
            $manager->persist($category);
            $i ++;
        }

        $manager->flush();
    }

    /*public function getOrder()
    {
        return 2;
    }*/
}
