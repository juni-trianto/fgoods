<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_divisi extends CI_Model {


    public function divisi()
    {
        return $this->db->get('divisi')->result();
    }

    public function detail_divisi($kode)
    {
        $this->db->where('kode_divisi', $kode);
        return $this->db->get('divisi')->row();
    
    }
  public function detail_item12($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('material')->row();
    
    }
	 public function detail_in_fix($kode, $from, $to)
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
    public function data()
    {
        $this->db->group_by('id_material') ;
        return $this->db->get('list_transaksi')->result();
    }
	
	public function get_all_item_preview($to)
    { 
        return $this->db->select('item,kode,status,unit,no_bc,tanggal')
				->from('list_transaksi')
				->where('tanggal <=', $to)
				->group_by('kode')
				->get()->result();
				
    }
			

    public function get_preview($from, $to)
    { 
        return $this->db->select('item,kode,unit')
				->from('list_transaksi')
				->where('tanggal >=', $from)
				->where('tanggal <=', $to)
				->group_by('item')
				->get()->result();
				
    }
	
	public function get_item_filter_preview($kode, $to)
    { 
        return $this->db->select('item,kode,status,unit,no_bc,tanggal')
				->from('list_transaksi')
				->where('tanggal <=', $to)
				->where('kode_divisi',$kode)
				->group_by('kode')
				->get()->result();
				
    }
	public function get_item_filter_preview2($kode_divisi, $to,$kode_item)
    { 
        return $this->db->select('item,kode,status,unit,no_bc,tanggal')
				->from('list_transaksi')
				->where('tanggal <=', $to)
				->where('kode_divisi',$kode_divisi)
				->where('kode',$kode_item)
				->group_by('kode')
				->get()->result();
				
    }
    public function preview($from, $to)
    {
        $this->db->order_by('kode', 'ASC');
        $this->db->group_by(array("kode")); 
        $this->db->where('tanggal >=', $from);
        $this->db->where('tanggal <=', $to);
        return $this->db->get('list_transaksi')->result();
    }
    

    public function detail($kode, $from, $to)
    {        
        return $this->db->select("                                
                                    (SELECT sum(qty) FROM list_transaksi where kode = '$kode' and MONTH(tanggal) = MONTH(DATE_ADD('$from', INTERVAL -1 MONTH)) group by kode ) as qty_begining,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and tanggal between '$from' and '$to' group by kode) as qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and tanggal between '$from' and '$to' group by kode) as qty_ng,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and tanggal between '$from' and '$to' group by kode) as qty_out
                                ")
                        ->from ('list_transaksi')
                        ->get()->row();
    }
    public function jml_qty_begining_fix($kode, $month_begining, $year_begining)
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
	
	public function detail_item($kode, $to)
    {        
        return $this->db->select("  item,kode,unit,                               
                                    (SELECT sum(qty) FROM list_transaksi where kode = '$kode' and tanggal <= '$to' ) as qty_begining,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and tanggal <= '$to' ) as qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and tanggal <= '$to' ) as qty_ng,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and tanggal <= '$to' ) as qty_out
                                ")
                        ->from ('list_transaksi')
						->where('kode',$kode)
						-> group_by('kode')
                        ->get()->row();
    }
	
	public function detail_item_month($kode,$from,$to)
    {        
        return $this->db->select("  item,kode,unit,                               
                                    (SELECT sum(qty) FROM list_transaksi where kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_begining,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_ng,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_out
                                ")
                        ->from ('list_transaksi')
						->where('kode',$kode)
						-> group_by('kode')
                        ->get()->row();
    }
		
	public function detail_item_divisi($kode, $kode_divisi, $to)
    {        
        return $this->db->select("  item,kode,unit,                               
                                    (SELECT sum(qty) FROM list_transaksi where kode = '$kode' and kode_divisi = '$kode_divisi' and tanggal <= '$to' ) as qty_begining,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and kode_divisi = '$kode_divisi' and tanggal <= '$to' ) as qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and kode_divisi = '$kode_divisi' and tanggal <= '$to' ) as qty_ng,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode'  and kode_divisi = '$kode_divisi' and tanggal <= '$to' ) as qty_out
                                ")
                        ->from ('list_transaksi')
						->where('kode',$kode)
						->where('kode_divisi',$kode_divisi)
						-> group_by('kode')
                        ->get()->row();
    }
	
	public function detail_item_divisi_month($kode, $kode_divisi,$from,$to)
    {        
        return $this->db->select("  item,kode,unit,                               
                                   (SELECT sum(qty) FROM list_transaksi where kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_begining,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'IN' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_in,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'NG' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_ng,
                                    (SELECT sum(qty) FROM list_transaksi  where status_transaksi = 'OUT' and kode = '$kode' and tanggal BETWEEN  '$from' and '$to' ) as qty_out
                                ")
                        ->from ('list_transaksi')
						->where('kode',$kode)
						->where('kode_divisi',$kode_divisi)
						-> group_by('kode')
                        ->get()->row();
    }
	
	
    public function current_in($id_material, $current_from, $current_to)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('tanggal >=', $current_from);
        $this->db->where('tanggal <=', $current_to);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }
    

    public function current_out($id_material, $current_from, $current_to)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('tanggal >=', $current_from);
        $this->db->where('tanggal <=', $current_to);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }
    

    public function jml_in($id_material, $from, $to)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('tanggal >=', $from);
        $this->db->where('tanggal <=', $to);
        $this->db->where('status_transaksi','IN');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }

    

    public function jml_out($id_material, $current_from, $current_to)
    {
        $this->db->select('*');
        $this->db->from('list_transaksi');
        $this->db->select_sum('qty');
        $this->db->where('id_material', $id_material);
        $this->db->where('tanggal >=', $current_from);
        $this->db->where('tanggal <=', $current_to);
        $this->db->where('status_transaksi','OUT');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
            } else {
            return false;
        }
    }
    

public function material()
    {
        return $this->db->get('material')->result();
    }



    

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
