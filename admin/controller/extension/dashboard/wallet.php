<?php
class ControllerExtensionDashboardWallet extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/dashboard/wallet');

		$this->document->setTitle("YUSUSFf");

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('dashboard_wallet', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = ''; 
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/dashboard/wallet', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/dashboard/wallet', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=dashboard', true);

		if (isset($this->request->post['dashboard_wallet_width'])) {
			$data['dashboard_wallet_width'] = $this->request->post['dashboard_wallet_width'];
		} else {
			$data['dashboard_wallet_width'] = $this->config->get('dashboard_wallet_width');
		}
		
		$data['columns'] = array();
		
		for ($i = 3; $i <= 12; $i++) {
			$data['columns'][] = $i;
		}
		
		if (isset($this->request->post['dashboard_wallet_status'])) {
			$data['dashboard_wallet_status'] = $this->request->post['dashboard_wallet_status'];
		} else {
			$data['dashboard_wallet_status'] = $this->config->get('dashboard_wallet_status');
		}

		if (isset($this->request->post['dashboard_wallet_sort_order'])) {
			$data['dashboard_wallet_sort_order'] = $this->request->post['dashboard_wallet_sort_order'];
		} else {
			$data['dashboard_wallet_sort_order'] = $this->config->get('dashboard_wallet_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/dashboard/wallet_settings_form', $data));
	}
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/dashboard/wallet')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
	public function dashboard() {
		$this->load->language('extension/dashboard/wallet');

		$data['user_token'] = $this->session->data['user_token'];

	 
		$this->load->model('wallet/wallet');
		$wallet_balance = $this->model_wallet_wallet->getWallet(663395);
 
		$data['wallet_balance'] = $wallet_balance;

		$data['wallet'] = $this->url->link('wallet/wallet', 'user_token=' . $this->session->data['user_token'], true); 

		return $this->load->view('extension/dashboard/wallet_balance', $data);
	}
}
