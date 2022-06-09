<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Divisi.xls");
?>
<style type="text/css">
  table
  {
    border-collapse: collapse;
  }
  th
  {
    border: 1px #000 solid;
    border-collapse: collapse;
  }
  td
  {
    border: 1px #000 solid;
    border-collapse: collapse;
  }
</style>
<table width="100%" style="font-family: tahoma; font-size: 12px;">
        
    <tr>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">No</th>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">Description</th>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">Code</th>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">Unit</th>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">Beginning Stock</th>
            <th style="text-align: center;vertical-align: middle;">IN</th>
            <th colspan="2" style="text-align: center;vertical-align: middle;">OUT</th>
            <th rowspan="2" style="text-align: center;vertical-align: middle;">Ending Stok</th>
    </tr> 
    <tr>
      <th style="text-align: center;">Import Etc</th>
      
      <th style="text-align: center;">NG</th>
      <th style="text-align: center;">Prod</th>
    </tr>

    <tbody style="border: 0px #fff solid;">
      <?php 
        $no = 1 ;
        foreach($hasil as $row)
        {
          $kode = $row->kode ;
          //$det = $this->M_divisi->detail($kode, $from, $to) ;
      ?>
      <tr>
        
        <td>
          <?php echo $no++ ; ?>
        </td>
        
        <td>
          <?php echo $row->item; ?>
        </td>
        <td  style="text-align: center;">
          <?php echo $row->kode; ?>
        </td>
        <td style="text-align: center;">
          <?php echo $row->unit; ?>
        </td>
        <td style="text-align: center;">
          <?php echo $row->qty_begining; ?>
        </td>
        <td style="text-align: center;">
          <?php echo $row->qty_in; ?>
        </td>
        <td style="text-align: center;">
          <?php echo $row->qty_ng; ?>
        </td>
        <td style="text-align: center;">
          <?php echo $row->qty_out; ?>
        </td>
        <td style="text-align: center;">
          <?php 
            echo $row->qty_begining + $row->qty_in - $row->qty_ng - $row->qty_out ;
          ?>
        </td>

      </tr>
      <?php } ?>
    </tbody>
  </table>