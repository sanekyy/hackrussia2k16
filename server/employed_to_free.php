<?php
include('db.inc');
if (!$_GET['scrubs_id'] || !$_GET['department_id'])
{
	echo -1;
}
else
{
	$scrubs_id = $_GET['scrubs_id'];
	$department_id = $_GET['department_id'];
	$query = "SELECT employed, buffer, num_of_place FROM department_detail_table WHERE scrubs_id=$scrubs_id AND department_id=$department_id";
	$row = mysql_fetch_object(mysql_query($query));
	$buffer = $row->buffer;
	$empl = $row->employed;
	$num_of_place = $row->num_of_place;
	if ($empl != 0)
	{
		$empl--;
		$query = "UPDATE department_detail_table SET employed=$empl WHERE scrubs_id=$scrubs_id AND department_id=$department_id";
		$dummy = mysql_query($query);
		if (!$dummy)
			echo -1;
		else
			echo $num_of_place . '|' . $empl . '|' . $buffer;
	}
}
?>