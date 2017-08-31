<?php

namespace BackBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackBundle\Entity\Compagny;

class LoadCompagny implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $names = ['October Films',
            'The Samuel Goldwyn Company',
            'Studio Canal',
            'Universal Pictures',
            ];
        foreach ($names as $name) {
            $compagny = new Compagny();
            $compagny->setCompagnyName($name);
            $manager->persist($compagny);
            $manager->flush();
        }
    }

}
