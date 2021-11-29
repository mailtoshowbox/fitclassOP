<?php
class ModelWalletWallet extends Model {

	public function getWallet($customer_id) {
 
		$query = $this->db->query("SELECT balance FROM wallet WHERE id = ".(int)$customer_id);

		return $query->row['balance'];
	}
	public function getRecentWallet($data = array()) {



		echo "<pre>";
		print_r($data);
		exit;

	//	$sql = "SELECT balance FROM wallet WHERE id = ".(int)$customer_id;
		
		
	//	$query = $this->db->query($sql);

		//return $query->rows;
	}
}
