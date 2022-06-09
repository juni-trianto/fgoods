<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function ambil_tahun($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}


	function subject($subject){
	$pecah = explode('-',$subject);
	$array	   = array($pecah[0]);
	$return		= implode('-',$array);
	return  $return;
	}
	
function kekata($x){
    $x=abs($x);
    $angka=array("","satu","dua","tiga","empat","lima",
    "enam","tujuh","delapan","sembilan","sepuluh","sebelas");
    $temp="";
    if($x<12){
        $temp=" ".$angka[$x];
    }elseif($x<20){
        $temp=kekata($x-10)." belas";
    }elseif($x<100){
        $temp=kekata($x/10)." puluh".kekata($x%10);
    }elseif($x<200){
        $temp=" seratus".kekata($x-100);
    }elseif($x<1000){
        $temp=kekata($x/100)." ratus".kekata($x%100);
    }elseif($x<2000){
        $temp=" seribu".kekata($x-1000);
    }elseif($x<1000000){
        $temp=kekata($x/1000)." ribu".kekata($x%1000);
    }elseif($x<1000000000){
        $temp=kekata($x/1000000)." juta".kekata($x%1000000);
    }elseif($x<1000000000000){
        $temp=kekata($x/1000000000)." milyar".kekata(fmod($x,1000000000));
    }elseif($x<1000000000000000){
        $temp=kekata($x/1000000000000)." trilyun".kekata(fmod($x,1000000000000));
    }    
        return$temp;
}
 
 
function terbilang($x,$style=4){
    if($x<0){
        $hasil="minus ".trim(kekata($x));
    }else{
        $hasil=trim(kekata($x));
    }    
    switch($style){
        case 1:
            $hasil=strtoupper($hasil);
            break;
        case 2:
            $hasil=strtolower($hasil);
            break;
        case 3:
            $hasil=ucwords($hasil);
            break;
        default:
            $hasil=ucfirst($hasil);
            break;
    }    
    return$hasil;
}
	
	function reset_rupiah($rupiah){
	$pecah = explode('.',$rupiah);
	$return		= implode('',$pecah);
	return  $return;
	}
	
	function tgl_default($tanggal){
	$tanggalan = explode('-',$tanggal);
	$array	   = array($tanggalan[1],$tanggalan[2],$tanggalan[0]);
	$return		= implode('/',$array);
	return  $return;
	}
	
	function reset_tgl($tanggal){
	$tanggalan = explode('-',$tanggal);
	$array	   = array($tanggalan[2],$tanggalan[1],$tanggalan[0]);
	$return		= implode('-',$array);
	return  $return;
	}
	
	
	function hightlight($str, $keywords = '')
	{
	$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

	$style = 'highlight';
	$style_i = 'highlight_important';

	/* Apply Style */

	$var = '';

	foreach(explode(' ', $keywords) as $keyword)
	{
	$replacement = "<span class='".$style."'>".$keyword."</span>";
	$var .= $replacement." ";

	$str = str_ireplace($keyword, $replacement, $str);
	}
	$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
	return $str;
	}
	  