<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\NopDebtBundle\Entity\Account;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

class AccountFixtures extends  AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 10) {
            $account = new Account();
            $rand = rand(1, 20);
            $account->setHash(uniqid());
            $account->setUser($this->getReference('user-'.$rand));
            $account->setCreatedAt($faker->dateTime);
            $account->setUpdatedAt($faker->dateTime);
            $manager->persist($account);
            $this->addReference('account-'.$i,$account);
            $i ++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
