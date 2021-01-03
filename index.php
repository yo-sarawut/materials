<?php  
 include('Curl.php');  
 $curl = new Curl();  
 $json = $curl->get('https://query.yahooapis.com/v1/public/yql?format=json&q=select+%2A+from+weather.forecast+where+woeid%3D1225448');  
 $json = json_decode($json);  
 ?>  
 <div>วันที่ : <?php echo date('d/m/Y H:i:s',strtotime($json->query->results->channel->lastBuildDate)); ?></div>  
 <div>สถานที่ : <?php echo $json->query->results->channel->location->city; ?></div>  
 <div>พระอาทิตย์ขึ้นเวลา : <?php echo date('d/m/Y H:i:s',strtotime($json->query->results->channel->astronomy->sunrise)); ?></div>  
 <div>พระอาทิตย์ตกเวลา : <?php echo date('d/m/Y H:i:s',strtotime($json->query->results->channel->astronomy->sunset)); ?></div>  
 <div>อุณหภูมิ : <?php echo $json->query->results->channel->item->condition->temp; ?></div>  
 <div>สภาพอากาศ : <?php echo $json->query->results->channel->item->condition->text; ?></div>  
 <div>พยากรณ์อากาศล่วงหน้า</div>  
 <table>  
  <thead>  
  <tr>  
   <th>วัน</th>  
   <th>วันที่</th>  
   <th>อุณหภูมิสูงสุด</th>  
   <th>อุณหภูมิต่ำสุด</th>  
   <th>สภาพอากาศ</th>  
  </tr>  
  </thead>  
  <tbody>  
  <?php foreach($json->query->results->channel->item->forecast as $value){ ?>  
  <tr>  
   <td><?php echo $value->day; ?></td>  
   <td><?php echo $value->date; ?></td>  
   <td><?php echo $value->high; ?></td>  
   <td><?php echo $value->low; ?></td>  
   <td><?php echo $value->text; ?></td>  
  </tr>  
  <?php } ?>  
  </tbody>  
 </table>  