<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\NopDebtBundle\Entity\Pot;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

class PotFixtures extends  AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 10) {
            $pot = new Pot();
            $rand = rand(1, 10);
            $pot->setName($faker->word);
            $pot->setEvent($this->getReference('event-'.$rand));
            $pot->setDescription($faker->word);
            $pot->setWho($faker->name);
            $pot->setUser($this->getReference('user-'.$rand));
            $pot->setDateEnd($faker->dateTime);
            $pot->setAmount($faker->randomNumber);
            $pot->setHash(uniqid());

            $manager->persist($pot);
            $this->addReference('pot-'.$i,$pot);
            $i ++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}
