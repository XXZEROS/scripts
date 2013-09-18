<table width="100%" cellpadding="0" cellspacing="0" class="blog">
  <tr>
    <td valign="top"><div>
      <table width="100%" class="contentpaneopen">
        <tr>
          
          
      </table><table width="100%" cellpadding="5" cellspacing="0" class="contentpaneopen">
        <tr>
          <td width="299" bgcolor="#F0F0F0" class="contentheading" >&nbsp;&nbsp;&nbsp;<a href="<?  $sorgu = mysql_query("SELECT * FROM kategori WHERE katid like '".$row_gs['katid']."' order by Katid desc limit 1");
while($yaz=mysql_fetch_array($sorgu)){ ?><?=$site;?>/kat-<?=$yaz['katid'];?>-<?=t2e($yaz['katadi']);?><? } ?>/<?php echo $row_gs['id']; ?>-<?php echo t2e($row_gs['baslik']); ?>.html" class="baslik"><?=$row_gs['baslik'];?></a></td>
          
          
          
          
          
          
          <td width="137" align="right" bgcolor="#F0F0F0" class="buttonheading">&nbsp;</td>
         
        </tr>
        <tr>
          <td class="contentheading" ><span class="buttonheading"><span style="font-size: 10px; color: #666; font-family: 'Courier New', Courier, monospace;">Yazar:</span> <span class="kiz"><?php echo $row_gs['yazar']; ?></span></span></td>
        
          <td align="right" class="buttonheading"><span style="font-size: 10px; color: #666; font-family: 'Courier New', Courier, monospace;">Tarih:</span> <span class="kiz"><?php echo $row_gs['tarih'];  ?></span></td>
        </tr>
      </table>
      <table width="100%" class="contentpaneopen">
      
        
        <tr>
          <td valign="top" colspan="2"><p><?php echo linke($row_gs['icerik']); ?></p></td>
        </tr>
      </table>
    <span class="article_separator">&nbsp;</span> </div></td>
  </tr>
</table>