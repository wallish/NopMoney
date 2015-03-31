<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\NopDebtBundle\Entity\Event;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

class EventFixtures extends  AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 10) {
            $event = new Event();
            $rand = rand(1, 10);
            $event->setName($faker->word);
            $event->setActivate(true);
            $manager->persist($event);
            $this->addReference('event-'.$i,$event);
            $i ++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}
