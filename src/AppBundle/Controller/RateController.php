<?php
// src/AppBundle/Controller/RateController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Rate;

class RateController extends controller {
	
	public function indexAction () {
		
	}
	
    /**
     * @Route("/rate/{id_comment}/{updown}/{id_user}")
     * @Method("PUT")
     */
    public function RateAction($id_comment, $updown, $id_user) {
		$em = $this->getDoctrine()->getManager();
		$comment = $em->getRepository('AppBundle:Comment')->find($id_comment);
		
		$data['comment'] = (int)$id_comment;
		$data['updown'] = (int)$updown;
		if ($comment) {
			$rate = new Rate ();
			$rate->setIdComment($id_comment);
			$rate->setIdUser($id_user);
			$updown = $updown==0?0:1;
			$rate->setRate ($updown);

			$em = $this->getDoctrine()->getManager();
			$em->persist($rate);
			$em->flush();
			$msg = 'OK';
			$statusCode  = 201;
		} else {
			$msg = 'Error';
			$statusCode  = 204;
		}
		
		return new JsonResponse (
			array('meta' => array('code' => $statusCode,
                                  'message' => $msg),
                  'data' => $data
            ),
            $statusCode
		);
		
    }
    // HTTP 201 Created 
    
    /**
     * @Route("/getTotalScoreAction/{id_comment}", requirements={"id_comment": "\d+"})
     * @Method("GET")
     */
    public function getTotalScoreAction ($id_comment) {
		$repository = $this->getDoctrine()->getRepository('AppBundle:Comment');
		$rate = $this->getDoctrine()->getRepository('AppBundle:Rate');
		$comment = $repository->findOneById($id_comment);
		if ($comment) {
			$res = $rate->findTotalScoreAction($id_comment);
			$data['totalScore'] = (int)$res;
			$msg = 'OK';
			$statusCode = 200;
		} else {
			$data['totalScore'] = false;
			$msg = 'Error';
			$statusCode = 204;
		}
		return new JsonResponse (
			array('meta' => array('code' => $statusCode,
                                  'message' => $msg),
                  'data' => $data
            ),
            $statusCode
		);
	}
	
	
}
