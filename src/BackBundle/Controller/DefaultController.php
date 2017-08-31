<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use BackBundle\Entity\Movie;
use BackBundle\Entity\Soundtracks;
use BackBundle\Entity\Cast;
use BackBundle\Entity\Credit;
use BackBundle\Entity\Gallery;
use BackBundle\Entity\Markers;
use BackBundle\Entity\Award;
use BackBundle\Entity\Compagny;
use BackBundle\Form\MovieType;
use BackBundle\Form\CastType;
use BackBundle\Form\MarkersType;
use BackBundle\Form\GalleryType;
use BackBundle\Form\SoundtracksType;
use BackBundle\Form\CreditType;
use BackBundle\Form\AwardType;
use BackBundle\Form\CompagnyType;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('BackBundle:Default:index.html.twig');
    }
    
    public function showAllMovieAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('BackBundle:Movie');
        $rows = $repository->findAll();
        return $this->render("BackBundle:Default:showAllMovie.html.twig", array('rows' => $rows));
    }

    public function showAllDQLMovieAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('BackBundle:Movie');
        $rows = $repository->getAll();
        return $this->render("BackBundle:Default:showAllMovie.html.twig", array('rows' => $rows));
    }

    public function showAllDbalMovieAction() {
        $conn = $this->get('database_connection');
        $query = "SELECT enTitle FROM movie";
        $rows = $conn->fetchAll($query);
        return $this->render("BackBundle:Default:showAllMovie.html.twig", array('rows' => $rows));
    }
    
    public function extractDbalAction() {
        $conn = $this->get('database_connection');
        $query = "SELECT enTitle FROM movie";
        $rows = $conn->fetchAll($query);
        return $this->render("BackBundle:Default:extractAllAjax.html.twig", array('rows' => $rows));
    }
    
    public function extractAllAjaxAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $tag = $request->get('tag');
            $conn = $this->get('database_connection');
            $query = "SELECT plot FROM movie WHERE enTitle='" . $tag . "'";
            $rows = $conn->fetchAll($query);
            return new JsonResponse(array('data' => json_encode($rows)));
        }
        return $this->render("BackBundle:Default:extractAllAjax.html.twig");
    }

    public function insertMovieAction(Request $request) {
        $movie = new movie();
        $form = $this->createForm(MovieType::class, $movie);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:insertMovie.html.twig", array('form' => $form->createView()));
    }

    public function insertCastAction(Request $request) {
        $cast = new cast();
        $form = $this->createForm(CastType::class, $cast);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $cast->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cast);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function insertSoundtracksAction(Request $request) {
        $soundtracks = new soundtracks();
        $form = $this->createForm(SoundtracksType::class, $soundtracks);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($soundtracks);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function insertCreditAction(Request $request) {
        $credit = new credit();
        $form = $this->createForm(CreditType::class, $credit);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($credit);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function insertAwardAction(Request $request) {
        $award = new award();
        $form = $this->createForm(AwardType::class, $award);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($award);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function insertCompagnyAction(Request $request) {
        $compagny = new compagny();
        $form = $this->createForm(CompagnyType::class, $compagny);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compagny);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function insertGalleryAction(Request $request) {
        $gallery = new gallery();
        $form = $this->createForm(GalleryType::class, $gallery);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $gallery->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallery);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function showAllMarkersAction(Request $request) {
        $conn = $this->get('database_connection');
        $query = "SELECT * FROM markers";
        $filename = "point.xml";
        if (file_exists($filename)) {
            unlink($filename);
        } else {
            echo "fichier xml n existe pas";
        }
        $xml = '<?xml version="1.0" encoding="utf8" ?>';
        $xml.= '<markers>';
        while ($point = $conn->fetchAll($query)) {
            $xml.= "<marker id='" . $point->id . "' lat='" . $point->lat . "' lng='" . $point->lng . "' address='" . $point->address . "' scene='" . $point->scene . "'/>";
        }
        $xml.= '</markers>';
        file_put_contents("$filename", $xml);
        $latitude = "40.6911111";
        $longitude = "-73.95";
        return $this->render("BackBundle:Default:showAllMarkers.html.twig", array('xml' => $xml));
    }

    public function insertMarkersAction(Request $request) {
        $markers = new markers ();
        $form = $this->createForm(MarkersType::class, $markers);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($markers);
            $em->flush();
            $request->getSession()->getFlashBag()->add('msg', 'new record created successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render("BackBundle:Default:showForm.html.twig", array('form' => $form->createView()));
    }

    public function deleteMovieAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $tag = $request->get('tag');
            $conn = $this->get('database_connection');
            $conn->delete('movie', array('enTitle' => $tag));
            $response = new Response();
            return new JsonResponse($status = $response->getStatusCode());
            // return $this->renderPartial();
        }
        return $this->render("BackBundle:Default:index.html.twig");
    }

    public function updateMovieAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $tag = $request->get('tag');
            $conn = $this->get('database_connection');
            $query = "SELECT * FROM movie WHERE enTitle='" . $tag . "'";
            $rows = $conn->fetchAssoc($query);
            return new JsonResponse(array('data' => json_encode($rows)));
        }
        return $this->render("BackBundle:Default:index.html.twig");
    }

    public function testAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('BackBundle:Movie');
        $rows = $repository->findBy(array('enTitle' => 'vertigo'));
        var_dump($rows);
        return new response('lll');
    }

}
