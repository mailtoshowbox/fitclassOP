<?php
class ControllerCustomerCustomer extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('wallet/wallet');

		$this->document->setTitle($this->language->get('heading_title'));

		echo "-------";

		exit;

	//	$this->load->model('customer/customer');

		//$this->getList();
	}
}