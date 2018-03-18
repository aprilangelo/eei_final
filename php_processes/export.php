<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");

#main header
$query = "SELECT MONTHNAME(CURRENT_DATE()) as month";
$result = mysqli_query($db,$query);
$rec = mysqli_fetch_assoc($result);

$columnHeader ='';
$columnHeader = "Report for the Month of " . $rec['month'] . "\t";

echo ucwords($columnHeader) ."\n" . "\n";

#severity levels
$query = "SELECT s.severity_level, count(t.ticket_id) FROM ticket_t t RIGHT JOIN sla_t s ON (t.severity_level=s.id) group by s.id UNION SELECT 'Unassigned', count(ticket_id) FROM ticket_t t where t.severity_level IS NULL AND MONTH(t.date_prepared)";

$result = mysqli_query($db,$query);

$columnHeader ='';
$columnHeader = ucwords("Severity Level")."\t".ucwords("Ticket Count")."\t";


$setData='';

while($rec = mysqli_fetch_row($result))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .=trim($rowData)."\n";
}


header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=eei report.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n" . $setData ."\n";
#Open vs closed

$query = "SELECT 'Open', COUNT(ticket_id) AS count FROM ticket_t WHERE ticket_status < '7'
UNION SELECT 'Closed', COUNT(ticket_id) AS count FROM ticket_t WHERE ticket_status > '6' ;
";
$result = mysqli_query($db,$query);

$columnHeader ='';
$columnHeader = ucwords("Status")."\t".ucwords("Ticket Count")."\t";


$setData='';

while($rec = mysqli_fetch_row($result))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}
echo ucwords($columnHeader)."\n".$setData."\n";

#Categories
$query = "SELECT 'Technicals' , COUNT(ticket_category) AS cat FROM ticket_t WHERE ticket_category='Technicals'
UNION SELECT 'Access' , COUNT(ticket_category) AS cat FROM ticket_t WHERE ticket_category='Access'
UNION SELECT 'Network' , COUNT(ticket_category) AS cat FROM ticket_t WHERE ticket_category='Network'
";
$query = "SELECT t.ticket_category, count(t.ticket_id) as 'Ticket Count' FROM ticket_t t WHERE t.ticket_category is not null AND t.ticket_category!='' group by t.ticket_category";

$result = mysqli_query($db,$query);


$columnHeader ='';
$columnHeader = ucwords("Category")."\t".ucwords("Ticket Count")."\t";


$setData='';

while($rec = mysqli_fetch_row($result))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}
echo ucwords($columnHeader)."\n".$setData."\n";

#tickets per month
$query = "SELECT MONTHNAME(t.date_prepared) as Month, count(t.ticket_id) as 'Ticket Count' FROM ticket_t t WHERE YEAR(t.date_prepared) = YEAR(CURRENT_DATE()) group by MONTHNAME(t.date_prepared)";
$result = mysqli_query($db,$query);


$columnHeader ='';
$columnHeader = ucwords("Month")."\t".ucwords("Ticket Count")."\t";


$setData='';

while($rec = mysqli_fetch_row($result))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}
echo ucwords($columnHeader)."\n".$setData."\n";

exit;
?>
