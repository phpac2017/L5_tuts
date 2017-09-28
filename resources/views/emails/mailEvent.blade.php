<!--This is a blade template that goes in email message to site administrator-->
<?php

$date_time = date("F j, Y, g:i a");
//$userIpAddress = Request::getClientIp();
?> 

<?php foreach($items as $key => $item){?>
	<b>ID</b>: <?php echo $key+1;?> <br/>
	<b>Title</b>: <?php echo $item['title'];?> <br/>
	<b>Description</b>: <?php echo $item['description'];?> <br/>
<?php }?>

Date: <?php echo($date_time);?><br />
<!--User IP address: <?php //echo($userIpAddress);?><br />-->
 
</p>