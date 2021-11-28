<?php
class ModelWalletWallet extends Model {

	public function getWallet($customer_id) {
 
		$query = $this->db->query("SELECT balance FROM wallet WHERE id = ".(int)$customer_id);

		return $query->row['balance'];
	}
}
