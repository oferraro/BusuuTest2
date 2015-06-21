<?php

namespace AppBundle\Entity;
use Doctrine\ORM\EntityRepository;

class RateRepository extends EntityRepository 
{

	public function findTotalScoreAction ($id_comment) {
		$em = $this->getEntityManager();
		$query = $em->CreateQuery ("SELECT count(r.idComment) FROM AppBundle:Rate r where r.idComment = :id_comment and r.rate = 1");
		$query->setParameter('id_comment', $id_comment);
        $res = $query->getSingleResult();
        
        $query2 = $em->CreateQuery ("SELECT count(r.idComment) FROM AppBundle:Rate r where r.idComment = :id_comment and r.rate = 0");
		$query2->setParameter('id_comment', $id_comment);
        $res2 = $query2->getSingleResult();
        
        $possitive = isset($res[1])?$res[1]:0;
        $negative  = isset($res2[1])?$res2[1]:0;
        return $possitive - $negative;
	}
	
}
