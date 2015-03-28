<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\NopDebtBundle\Entity\Type;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

class TypeFixtures extends  AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 10) {
            $type = new Type();
            $type->setDescription($faker->word);
            $type->setActivate(1);
            $type->setCreatedAt($faker->dateTime);
            $type->setUpdatedAt($faker->dateTime);

            $manager->persist($type);

            $this->addReference('type-'.$i,$type);
            $i ++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
