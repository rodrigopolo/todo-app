<?php

class JsonView extends \Slim\View
{
	public function render($status = 200, $data = array())
	{

		$data = array_merge(array('status' => $status), $this->all(), is_array($data) ? $data : array());

		if (isset($data['flash']) && is_object($data['flash'])) {
			$flash = $this->data->flash->getMessages();
			if (count($flash)) {
				$data['flash'] = $flash;
			} else {
				unset($data['flash']);
			}
		}

		$app = \Slim\Slim::getInstance();

		$response = $app->response();

		$response->status($status);
		$response->header('Content-Type', 'application/json');
		$response->body(json_encode($data, JSON_NUMERIC_CHECK));

		$app->stop();		

	}
}