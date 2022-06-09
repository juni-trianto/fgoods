<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_item extends CI_Model {


    public function material()
    {
        return $this->db->get('material')->result();
    }
    public function detail_item($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('material')->row();
    
    }

    public function preview($from, $to)
    {
        return $this->db->select("                                  
                                    item,
                                    kode,
                                    status,
                                    unit,
                                    no_bc,
                                    tanggal
                                ")
                        ->from ('list_transaksi')
                        ->where('tanggal >=', $from)
                        ->where('tanggal <=', $to)
                        ->group_by('kode')
                        ->get()->result();
    }

    public function filter($kode, $from, $to)
    {
        return $this->db->select("                                  
                                    item,
                                    kode,
                                    status,
                                    unit,
                                    no_bc,
                                    tanggal
                                ")
                        ->from ('list_transaksi')
                        ->where('tanggal >=', $from)
                        ->where('tanggal <=', $to)
                        ->where('kode', $kode)
                        ->group_by('kode')
                        ->get()->result();
    }


    public function get_tgl_in($kode, $no_bc)
    {
        return $this->db->select("                               
                                    tanggal,kode_transaksi
                                ")
                        ->from ('list_transaksi')
                        ->where ('status_transaksi', 'IN')
                        ->where ('kode', $kode)
                        ->where ('no_bc', $no_bc)
                        ->get()->row();
    }

    public function detail($kode, $from, $to)
    {
        return $this->db->select("
                                    item,                                  
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and tanggal between '$from' and '$to') as jml_qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and tanggal between '$from' and '$to') as jml_qty_out,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and tanggal between '$from' and '$to') as jml_qty_ng
                                ")
                        ->from ('list_transaksi')
                        ->where ('kode', $kode)
                        ->get()->row();
    }

    public function jml_qty_end($kode, $no_bc, $from_begining, $end_begining, $from_lap, $to)
    {	
		return $this->db->select("
							item,
							(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and no_bc = '$no_bc' and tanggal between '$from_begining' and '$to' ) as jml_qty_in,
							(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and no_bc = '$no_bc' and tanggal between '$from_begining' and '$end_begining') as jml_qty_out_bln_beg,
							(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and no_bc = '$no_bc' and tanggal between '$from_lap' and '$to') as jml_qty_out_bln_lap,
							(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and no_bc = '$no_bc' and tanggal between '$from_begining' and '$to') as jml_qty_ng
						")
				->from ('list_transaksi')
				->where ('kode', $kode)
				->where ('no_bc', $no_bc)
				->group_by('no_bc')
				->get()->row();
						
    }

    public function detail_out($kode, $from, $to)
    {
        return $this->db->select("                                  
                                    no_bc,
                                    tanggal,
                                    kode_transaksi,
                                    qty
                                ")
                        ->from ('list_transaksi')
                        ->where('kode', $kode)
                        ->where('tanggal >=', $from)
                        ->where('tanggal <=', $to)
                        ->where('status_transaksi', 'OUT')
                        ->order_by('tanggal', 'ASC')
                        ->get()->result();
    }


    public function detail_in($kode, $from, $to)
    {
        return $this->db->select("                                  
                                    no_bc,
                                    tanggal,
                                    qty
                                ")
                        ->from ('list_transaksi')
                        ->where('kode', $kode)
                        ->where('tanggal >=', $from)
                        ->where('tanggal <=', $to)
                        ->where('status_transaksi', 'IN')
                          ->order_by('tanggal', 'ASC')
                        ->get()->result();
    }


    public function detail_ng($kode, $from, $to)
    {
        return $this->db->select("            

                                    no_bc,
                                    tanggal,
                                     kode_transaksi,
                                    qty
                                ")
                        ->where('kode', $kode)
                        ->where('tanggal >=', $from)
                        ->where('tanggal <=', $to)
                        ->where('status_transaksi', 'NG')
                        ->from ('list_transaksi')
                        ->order_by('tanggal', 'ASC')
                        ->get()->result();
    }


    public function jml_qty_begining($kode, $month_begining, $year_begining)
    {
        return $this->db->select("
                                    SUM(qty) as jml_qty_begining
                                ")
                        ->from ('list_transaksi')
                        ->where('kode', $kode)
                        ->where('status_transaksi', 'IN')
                        ->where('MONTH(tanggal)', $month_begining)
						->where('YEAR(tanggal)', $year_begining)
                        ->get()->row();
    }


    public function detail_begining($kode, $month_begining, $year_begining)
    {
        return $this->db->select("       
                                    no_bc,
                                    tanggal,
                                    qty
                                ")
                        ->from ('list_transaksi')
                        ->where('kode', $kode)
                        ->where('status_transaksi', 'IN')
                        ->where('MONTH(tanggal)', $month_begining)
						->where('YEAR(tanggal)', $year_begining)
                        ->get()->result();
    }
	
	public function jml_detail_qty_begining($kode, $no_bc, $month_begining, $year_begining){
		return $this->db->select("no_bc,
			(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and  no_bc = '$no_bc' and MONTH(tanggal) = '$month_begining'and YEAR(tanggal) = '$year_begining' ) as jml_qty_in,
			(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and  no_bc = '$no_bc' and MONTH(tanggal) = '$month_begining'and YEAR(tanggal) = '$year_begining') as jml_qty_out,
			(SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and  no_bc = '$no_bc' and MONTH(tanggal) = '$month_begining'and YEAR(tanggal) = '$year_begining') as jml_qty_ng
			")
			->from ('list_transaksi')
			->where('kode', $kode)
			->where ('no_bc', $no_bc)
			->group_by('no_bc')
			->get()->row();
	}


    public function detail_end($kode, $from_begining, $to)
    {
		$sql = "select 
					min(cast(tanggal as date)) as tanggal,
					no_bc,
					qty
					from list_transaksi
					where kode = '$kode'
					and tanggal between '$from_begining' and  '$to' 
					group by no_bc
					order by tanggal asc;";
		return $this->db->query($sql)->result();
    }



    public function get_bc_in($kode)
    {
        return $this->db->select("                               
                                    no_bc
                                ")
                        ->from ('list_transaksi')
                        ->where ('kode', $kode)
                        ->where ('status_transaksi', 'IN')
                        ->get()->result();
    }


}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
/*

                                    (SELECT tanggal FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and no_bc = '$no_bc_in') as tgl_end,
                                    
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and no_bc = '$no_bc_in') as qty_in_end,

                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and no_bc = '$no_bc_in') as end_qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and no_bc = '$no_bc_in') as end_qty_out,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and no_bc = '$no_bc_in') as end_qty_ng
*/