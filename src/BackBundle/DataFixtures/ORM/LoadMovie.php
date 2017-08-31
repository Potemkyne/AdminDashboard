<?php

namespace BackBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackBundle\Entity\Movie;

class LoadMovie implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $tab = array(
            array('dd', 'dd', 'ff', '2001-10-23', '02:08:00', 'sd', 'ee'),
        );
        foreach ($tab as $value) {
            $movie = new Movie();
            $movie->setFrTitle($value[0]);
            $movie->setEnTitle($value[1]);
            $movie->setPlot($value[2]);
            $movie->setReleaseDate($value[3]);
            $movie->setRunningTime($value[4]);
            $movie->setLanguage($value[5]);
            $movie->setStyle($value[6]);
            $manager->persist($movie);
            $manager->flush();
        }
    }

}
