<?php
namespace AppBundle\Services;
use AppBundle\Entity;


class RateService
{
    public function getTotalScoreAction ($id_comment) {
		
		$repository = $this->getDoctrine()->getRepository('AppBundle:Comment');
		$rate = $this->getDoctrine()->getRepository('AppBundle:Rate');
		
		$comment = $repository->findOneById(1)->getId();

		if (!$comment) {
			throw $this->createNotFoundException(
				'No Comment found for id '.$id_comment
			);
		}

			$query = sprintf("SELECT id) - 
				(SELECT count(id) from AppBundle:rate where id_comment=:id_comment and rate = 0) 
				FROM AppBundle:Rate WHERE id_comment=:id_comment and rate = 1");
                $this->pdo->prepare('set NAMES utf8')->execute();  // FIXME:
                $stmt = $this->pdo->prepare($query);
                $stmt->execute(array('id_comment' => $id_comment));
                $rates =  $stmt->fetch(\PDO::FETCH_ASSOC);

			print_r($rates); 
		die();
		
		/*foreach ($rates as $i => $v) {
			echo "<pre>"; echo $i; print_r($v);
		} die();*/
		
		$data = array ('totalScore' => '12');
		
		return new JsonResponse ($data);
	}

}
