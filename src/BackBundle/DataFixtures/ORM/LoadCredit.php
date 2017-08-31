<?php

namespace BackBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackBundle\Entity\Credit;

class LoadCredit implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $tab = array(
            array('1', 'Crying', 'Rebekah Del Rio'),
            array('1', 'Mountains Falling', 'David Lynch and John Neff'),
        );
        foreach ($tab as $value) {
            $credit = new Credit();
          //  $credit->setSoundtracks->setID($value[0]);
            $credit->setCreditTitle($value[1]);
            $credit->setCreditName($value[2]);
            $manager->persist($credit);
            $manager->flush();
        }
    }

}
