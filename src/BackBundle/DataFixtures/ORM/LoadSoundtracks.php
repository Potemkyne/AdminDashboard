<?php

namespace BackBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackBundle\Entity\Soundtracks ;

class LoadSoundtracks implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $tab = array(
            array('2001-10-23', 'ULM'),
            array('1997-02-18', 'Interscope'),
        );
        foreach ($tab as $value) {
            $soundtracks = new Soundtracks();
           // var_dump($soundtracks);
            $soundtracks->setLabel($value[1]);
            $soundtracks->setReleaseDate($value[0]);
            $manager->persist($soundtracks);
            $manager->flush();
        }
    }

}
