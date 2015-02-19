<?php

class grid_disqus_popular_box extends grid_list_box
{
	public function __construct()
	{
		$this->content=new StdClass();
		$this->content->forum = "";
		$this->content->limit = 5;
	}

	public function type()
	{
		return 'disqus_popular';
	}

	public function build($editmode) {

		// from settings page
		$api_key = get_site_option( "grid_disqus_api_key", "" );
		$access_token = get_site_option( "grid_disqus_access_token", "" );

		// from box settings
		$url_call = "http://disqus.com/api/3.0/threads/listPopular.json?"
				."api_key=" . $api_key
				."&access_token=" . $access_token
				."&forum=" . $this->content->forum
				// ."&interval=" . $instance['interval'] 
				."&limit=" . $this->content->limit;

		$args = array ( 'method' => 'GET');
		$result = wp_remote_request( $url_call , $args);
		$this->content->items = array();
		$this->content->error = "";
		$error = false;

		if(!is_wp_error($result)){
			$json = json_decode($result["body"]); 
			if($json->code == 0){
				$this->content->items = $json->response;
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}

		if($error){
			$this->content->error = "Request faild";
		}

		return $this->content;
	}

	public function contentStructure() {
		$cs = array();
		$cs[] = array(
			"key" => "forum",
			"type" => "text",
			"label" => "Forum",
		);
		$cs[] = array(
			"key" => "limit",
			"type" => "text",
			"label" => "Limit",
		);
		return $cs;
	}

}

?>