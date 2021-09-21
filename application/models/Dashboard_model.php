<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

	public function get_vehicle_types()
	{
		$this->db->select('*');
		$query = $this->db->get('config_vehicle_types');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}

	public function get_vehicle_count($type_id)
	{
		$this->db->select('COUNT(type_code) as count');
		$this->db->where('status','A');
		$this->db->where('type_code',$type_id);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->row()->count;
		else
			return 0;
	}

	public function get_fuel_consumption_monthly($type,$from_date,$to_date)
	{
		$this->db->select('vehicle_fuel.invoices');
		$this->db->join('vehicle_infor','vehicle_infor.id = vehicle_fuel.vehicle_id');
		if($type == 'Petrol')
		{
			$this->db->where('vehicle_infor.fuel_type <>','Diesel');
			$this->db->where('vehicle_infor.fuel_type <>','Electric');
		}
		if($type == 'Diesel')
		{
			$this->db->where('vehicle_infor.fuel_type <>','Petrol');
			$this->db->where('vehicle_infor.fuel_type <>','Electric');
			$this->db->where('vehicle_infor.fuel_type <>','Hybrid');
		}
		$this->db->where('vehicle_fuel.fuel_date >=',$from_date);
		$this->db->where('vehicle_fuel.fuel_date <=',$to_date);
		$query = $this->db->get('vehicle_fuel');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}

	public function get_operational_cost_monthly($from_date,$to_date)
	{
		$this->db->select('amount');
		$this->db->where('record_date >=',$from_date);
		$this->db->where('record_date <=',$to_date);
		$query = $this->db->get('vehicle_maintenance');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}

	public function get_revenue_due_count($due_date,$today)
	{
		$this->db->select('COUNT(vehicle_infor.rev_licen_renewal_expiry) as due_count');
		$this->db->where('rev_licen_renewal_expiry >=',$today);
		$this->db->where('rev_licen_renewal_expiry <=',$due_date);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->row()->due_count;
		else
			return 0;
	}

	public function get_revenue_due_data($due_date,$today)
	{
		$this->db->select('*,config_vehicle_types.type,vehicle_make.make');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('rev_licen_renewal_expiry >=',$today);
		$this->db->where('rev_licen_renewal_expiry <=',$due_date);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->result();
		else
			return 0;
	}

	public function get_revenue_over_due_count($today)
	{
		$this->db->select('COUNT(vehicle_infor.rev_licen_renewal_expiry) as over_due_count');
		$this->db->where('rev_licen_renewal_expiry <',$today);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->row()->over_due_count;
		else
			return 0;
	}


	public function get_revenue_over_due_data($today)
	{
		$this->db->select('*,config_vehicle_types.type,vehicle_make.make');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('rev_licen_renewal_expiry <',$today);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}



	public function get_insurance_due_count($due_date,$today)
	{
		$this->db->select('COUNT(vehicle_infor.vehiclea_insurance_detail) as due_count');
		$this->db->where('vehiclea_insurance_detail >=',$today);
		$this->db->where('vehiclea_insurance_detail <=',$due_date);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->row()->due_count;
		else
			return 0;
	}

	public function get_insurance_due_data($due_date,$today)
	{
		$this->db->select('*,config_vehicle_types.type,vehicle_make.make');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('vehiclea_insurance_detail >=',$today);
		$this->db->where('vehiclea_insurance_detail <=',$due_date);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}

	public function get_insurance_over_due_count($today)
	{
		$this->db->select('COUNT(vehicle_infor.vehiclea_insurance_detail) as over_due_count');
		$this->db->where('vehiclea_insurance_detail <',$today);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->row()->over_due_count;
		else
			return 0;
	}

	public function get_insurance_over_due_data($today)
	{
		$this->db->select('*,config_vehicle_types.type,vehicle_make.make');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('vehiclea_insurance_detail <',$today);
		$query = $this->db->get('vehicle_infor');
		if($query->num_rows()>0)
			return $query->result();
		else
			return false;
	}

	public function get_service_due_count($due_date,$today)
	{
		$this->db->select('COUNT(service_list.next_service_date) as due_count');
		$this->db->where('next_service_date >=',$today);
		$this->db->where('next_service_date <=',$due_date);
		$query = $this->db->get('service_list');
		if($query->num_rows()>0)
			return $query->row()->due_count;
		else
			return 0;
	}

	public function get_service_over_due_count($today)
	{
		$this->db->select_max('next_service_date');
		$this->db->where('next_service_date <',$today);
		$this->db->group_by('vehicle_id');
		$query = $this->db->get('service_list');
		if($query->num_rows()>0)
			return $query->result();
		else
			return 0;
	}


	public function get_service_due_data($due_date,$today)
	{
		$this->db->select('service_list.service_date,service_list.next_service_date,service_list.millage,service_list.next_milage,vehicle_infor.*,config_vehicle_types.type,vehicle_make.make');
		$this->db->join('vehicle_infor','vehicle_infor.id = service_list.vehicle_id');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('service_list.next_service_date >=',$today);
		$this->db->where('service_list.next_service_date <=',$due_date);
		$query = $this->db->get('service_list');
		if($query->num_rows()>0)
			return $query->result();
		else
			return 0;
	}


	public function get_service_over_due_data($today)
	{
		$this->db->select('vehicle_infor.*,config_vehicle_types.type,vehicle_make.make');
		$this->db->select_max('next_service_date');
		$this->db->join('vehicle_infor','vehicle_infor.id = service_list.vehicle_id');
		$this->db->join('config_vehicle_types','config_vehicle_types.id = vehicle_infor.type_code','left');
		$this->db->join('vehicle_make','vehicle_make.id = vehicle_infor.Make_code','left');
		$this->db->where('next_service_date <',$today);
		$this->db->group_by('vehicle_id');
		$query = $this->db->get('service_list');
		if($query->num_rows()>0)
			return $query->result();
		else
			return 0;
	}
}
