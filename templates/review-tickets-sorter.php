<?php
switch ((isset($_GET['view']) ? $_GET['view'] : ''))
{
    case ("technicals"):
      if($row['user_type']=='Administrator'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_status='$stat' AND ticket_t.ticket_category='Technicals'";
      }
      elseif($row['user_type']=='Requestor'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category = 'Technicals' AND stat.ticket_status = '$stat')";
      }
      break;

    case ("access"):
      if($row['user_type']=='Administrator'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_status='$stat' AND ticket_t.ticket_category='Access'";
      }
      elseif($row['user_type']=='Requestor'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category = 'Access' AND stat.ticket_status = '$stat')";
      }
      break;

    case ("network"):
      if($row['user_type']=='Administrator'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_status='$stat' AND ticket_t.ticket_category='Network'";
      }
      elseif($row['user_type']=='Requestor'){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category = 'Network' AND stat.ticket_status = '$stat')";
      }
      break;
  }

//if severity button for sorting is selected
switch ((isset($_GET['view']) ? $_GET['view'] : ''))
{
    case ("sev1"):
      $sev = 'SEV1';
      if($row['user_type'] == "Technicals Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Technicals' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";
      }elseif ($row['user_type'] == "Access Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Access' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] == "Network Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Network' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] ==  "Technician"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";

      }elseif ($row['user_type'] == "Network Engineer"){
        $query = "SELECT * FROM ticket_t LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";
      } else {
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status = '$stat' AND sev.severity_level='$sev'";
      }
      break;

    case ("sev2"):
    $sev = 'SEV2';
    if($row['user_type'] == "Technicals Group Manager"){
      $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Technicals' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

    }elseif ($row['user_type'] == "Access Group Manager"){
      $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Access' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

    }elseif ($row['user_type'] == "Network Group Manager"){
      $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Network' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

    }elseif ($row['user_type'] ==  "Technician"){
      $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";

    }elseif ($row['user_type'] == "Network Engineer"){
      $query = "SELECT * FROM ticket_t LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";
    } else {
      $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status = '$stat' AND sev.severity_level='$sev'";
    };
    break;
    case ("sev3"):
      $sev = 'SEV3';
      if($row['user_type'] == "Technicals Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Technicals' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";
      }elseif ($row['user_type'] == "Access Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Access' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] == "Network Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Network' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] ==  "Technician"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";

      }elseif ($row['user_type'] == "Network Engineer"){
        $query = "SELECT * FROM ticket_t LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";
      } else {
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status = '$stat' AND sev.severity_level='$sev'";
      }
      break;

    case ("sev4"):
      $sev = 'SEV4';
      if($row['user_type'] == "Technicals Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Technicals' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";
      }elseif ($row['user_type'] == "Access Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Access' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] == "Network Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Network' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] ==  "Technician"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";

      }elseif ($row['user_type'] == "Network Engineer"){
        $query = "SELECT * FROM ticket_t LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";
      } else {
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status = '$stat' AND sev.severity_level='$sev'";
      }
      break;

    case ("sev5"):
      $sev = 'SEV5';
      if($row['user_type'] == "Technicals Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Technicals' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";
      }elseif ($row['user_type'] == "Access Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Access' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] == "Network Group Manager"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING(ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE ticket_t.ticket_category='Network' AND stat.ticket_status='$stat' AND sev.severity_level='$sev'";

      }elseif ($row['user_type'] ==  "Technician"){
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";

      }elseif ($row['user_type'] == "Network Engineer"){
        $query = "SELECT * FROM ticket_t LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status='$stat' AND sev.severity_level='$sev' AND ticket_t.ticket_agent_id = '".$_SESSION['user_id']."'";
      } else {
        $query = "SELECT * FROM ticket_t LEFT JOIN service_ticket_t USING (ticket_id) LEFT JOIN user_access_ticket_t USING (ticket_id) LEFT JOIN sla_t sev ON sev.id = ticket_t.severity_level LEFT JOIN ticket_status_t stat ON stat.status_id = ticket_t.ticket_status WHERE stat.ticket_status = '$stat' AND sev.severity_level='$sev'";
      }
      break;
} ?>
