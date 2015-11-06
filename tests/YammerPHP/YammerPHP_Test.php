<?php

class YammerPHP_Test extends PHPUnit_Framework_TestCase {

	/**
	 * Set Up
	 */
	public function setup() {
		$config = array(
			'consumer_key' => YAMMER_CONSUMER_KEY,
			'consumer_secret' => YAMMER_CONSUMER_SECRET,
			'callbackUrl' => YAMMER_CALLBACK_URL
		);
		$this->object = new \YammerPHP\YammerPHP($config);
	}

	/**
	 * Tear Down
	 */
	public function teardown() {
		$this->object = null;
	}

	/**
	 * Test getAuthorizationUrl
	 *
	 * @covers \YammerPHP\YammerPHP::getAuthorizationUrl
	 */
	public function testGetAuthorizationUrl() {
		$url = $this->object->getAuthorizationUrl();
		$this->assertEquals(
			'https://www.yammer.com/dialog/oauth?client_id=123456789&redirect_uri=http%3A%2F%2Fexample.com%2Fcallback',
			$url,
			'Authorization URL matches with config values'
		);

		$url = $this->object->getAuthorizationUrl('http://another.example.com/callback');
		$this->assertEquals(
			'https://www.yammer.com/dialog/oauth?client_id=123456789&redirect_uri=http%3A%2F%2Fanother.example.com%2Fcallback',
			$url,
			'Authorization URL matches with config values'
		);
	}

}
