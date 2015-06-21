<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RateControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
		/* Check the Rate method */
        $crawler = $client->request('PUT', '/rate/'.rand(-20,50).'/'.rand(-20,50).'/'.rand(-20,50)); // id_comment, updown, id_user
		$response = $client->getResponse()->getStatusCode();
		$this->assertEquals(true, (201 == $response || 204 == $response));
		
        /* Rate method returns 201 or 204 (depending if comment exists or not, if comment does not exist it doesnt rate it) */
        
	}
	
	public function testGetTotalScore () {
        /* Check the getTotalScoreAction method */
        $client = static::createClient();
        $crawler = $client->request('GET', 'getTotalScoreAction/'.rand(0,50));
        $response = $client->getResponse()->getStatusCode();
		$this->assertEquals(true, (200 == $response || 204 == $response));
        
        $res = json_decode($client->getResponse()->getContent(), 1); 
        $ts  = $res['totalScore'];
        $this->assertEquals(true, (is_numeric($ts) || $ts == false));
                
    }
}
