<?php


namespace Geckoboard;


class Response extends \sfWebResponse
{
	
	public function getContent()
	{
		return json_encode( $this->content );
	}
	
}