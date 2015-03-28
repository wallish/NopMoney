<?php
namespace Wallish\NopDebtBundle\DataFixtures\ORM;

use Wallish\NopDebtBundle\Entity\Transaction;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

class TransactionFixtures extends  AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        $faker = \Faker\Factory::create('fr_FR');
        while ($i <= 100) {
            $transaction = new Transaction();
            $transaction->setDate($faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'));
            $transaction->setDescription($faker->word);
            $rand = rand(1, 10);
            $transaction->setType($this->getReference('type-'.$rand));
            $transaction->setAmount($faker->randomNumber);
            $transaction->setHash(uniqid());
            $transaction->setActivate(1);
            $manager->persist($transaction);
            $i ++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
