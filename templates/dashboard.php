<div class="col s12 m12 l12 table-header">
  <span class="table-title">Performance Dashboard</span>
  <button class="btn" id="request-form-export"><i class="material-icons">file_download</i>&nbsp;&nbsp;Export to Excel</button>
</div>
<div id="dashboard-main">
  <div class="row">
    <div class="col s12 m12 l12">
      <div class="row" id="kb">
        <h6 id="dashboard">Ticket Count For <?php echo date('F') ?></h6>
          <div class="col s12 m12 l8">
            <div class="row" id="sev">
              <?php
              $query = "SELECT s.severity_level, count(t.ticket_id) as count, s.description FROM ticket_t t RIGHT JOIN sla_t s ON (t.severity_level=s.id) group by s.id UNION SELECT 'Unassigned', count(ticket_id), '--' FROM ticket_t t where MONTH(date_prepared)=MONTH(CURRENT_DATE()) AND t.severity_level IS NULL";
              $result = mysqli_query($db,$query);
              while($row = mysqli_fetch_assoc($result)){
                switch($row['severity_level'])
                {
                    case("SEV1"):
                        $class = 'sev1';
                        break;

                   case("SEV2"):
                       $class = 'sev2';
                       break;

                   case("SEV3"):
                       $class = 'sev3';
                       break;

                   case("SEV4"):
                       $class = 'sev4';
                       break;

                   case("SEV5"):
                       $class = 'sev5';
                       break;

                  case("Unassigned"):
                      $class = 'unassigned';
                      break;
                }
                ?>
                  <div class="col s6 m6 l4">
                    <div class="card horizontal">
                      <div class="card-stacked">
                        <div class="card-content">
                          <div class="col s7 m7">
                            <p class='<?php echo $class?>' id="sev"><?php echo $row['severity_level']?></p>
                          </div>
                          <div class="col s5 m5 right-align">
                           <?php echo "<h5 id='dashboard'>" .  $row['count'] . "</h5>" .
                                 "<p class='dashboard no-margin'>" . $row['description'] . "</p>"; ?>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php };?>
            </div>
            <div class="chart">
              <div class="col s12 m12 l11" id="chart">
                <h6 id="dashboard">Ticket Count Per Month</h6>
                <canvas id="mycanvas"></canvas>
              </div>
            </div>
          </div>
          <div class="col s12 m12 l4">
            <div class="col s12 m12 l12">
              <div class="card horizontal gradient-45deg-amber-amber">
                <div class="card-stacked">
                <div class="card-content">
                  <div class="col s7 m7 left-align">
                    <i class="material-icons background-round mt-5">report</i>
                  </div>
                  <div class="col s5 m5 right-align white-text">
                    <?php
                      $query = "SELECT COUNT(*) as count FROM ticket_t WHERE date_required < now()";
                      $result = mysqli_query($db,$query);

                      while($row = mysqli_fetch_assoc($result)){
                         echo "<h4 id='dashboard'>" . $row['count'] . "</h4>" .
                         "<p class='dashboard no-margin'>" . "Overdue" . "</p>";
                     };
                    ?>
                 </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col s12 m12 l4">
            <div class="col s6 m6 l6">
              <div class="card horizontal gradient-45deg-light-blue-cyan">
                <div class="card-stacked">
                <div class="card-content">
                  <div class="col s7 m7 left-align">
                    <i class="material-icons background-round mt-5">lock_open</i>
                  </div>
                  <div class="col s5 m5 right-align white-text">
                    <?php
                      $query = "SELECT COUNT(*) AS count FROM ticket_t WHERE MONTH(date_prepared)=MONTH(CURRENT_DATE()) AND ticket_status < '7'";
                      $result = mysqli_query($db,$query);

                      while($row = mysqli_fetch_assoc($result)){
                         echo "<h4 id ='dashboard'>" . $row['count'] . "</h4>" .
                         "<p class='dashboard no-margin'>" . "Open" . "</p>";
                     };
                    ?>
                 </div>
                </div>
              </div>
              </div>
            </div>
            <div class="card horizontal gradient-45deg-light-blue-cyan">
              <div class="card-stacked">
              <div class="card-content">
                <div class="col s7 m7 left-align">
                  <i class="material-icons background-round mt-5">lock_outline</i>
                </div>
                <div class="col s5 m5 right-align white-text">
                  <?php
                    $query = "SELECT COUNT(*) AS count FROM ticket_t WHERE MONTH(date_prepared)=MONTH(CURRENT_DATE()) AND ticket_status > '6' AND severity_level IS NULL AND ticket_category IS NULL";
                    $result = mysqli_query($db,$query);

                    while($row = mysqli_fetch_assoc($result)){
                       echo "<h4 id='dashboard'>" . $row['count'] . "</h4>" .
                       "<p class='dashboard no-margin'>" . "Closed" . "</p>";
                   };
                  ?>
                </div></div>
              </div>
            </div>
            <div class="margin-top-dashboard">
            <ul id="projects-collection" class="collection z-depth-1">
              <li class="collection-item avatar">
                <i class="material-icons cyan circle">insert_chart</i>
                <h6 class="collection-header m-0">Ticket Category</h6>
                <p>Total Count for <?php echo date('F')?></p>
              </li>
            <?php
            $db = mysqli_connect("localhost", "root", "", "eei_db");
              $query = "SELECT ticket_category, count(ticket_id) as count FROM ticket_t WHERE ticket_category IS NOT NULL group by ticket_category UNION SELECT 'N/A', count(ticket_id) FROM ticket_t WHERE ticket_category IS NULL";
              $result = mysqli_query($db,$query);

              while($row = mysqli_fetch_assoc($result)){
                switch($row['ticket_category'])
                {
                    case("Technicals"):
                      $icon = 'storage';
                      $class = 'tech';
                      break;

                    case("Access"):
                      $icon = 'vpn_lock';
                      $class = 'accesst';
                      break;

                    case("Network"):
                      $icon = 'network_check';
                      $class = 'network';
                      break;

                    case("N/A"):
                      $icon = '';
                      $class = 'unassigned';
                      break;
                }
             ?>
              <div class="col s12 m12 l12" id="<?php echo $class ?>">
                <li class="collection-item" id="<?php echo $class ?>">
                  <div class="row" style="margin-bottom:0px">
                    <div class="col s3">
                      <p class='<?php echo $class?> no-margin' id="sev"><i class="material-icons"><?php echo $icon?></i></p>
                    </div>
                    <div class="col s5">
                      <p class='dashboard no-margin'> <?php echo $row['ticket_category'] ?> </p>
                    </div>
                    <div class="col s3">
                      <p class='no-margin'><?php echo  $row['count'] ?> tickets </p>
                    </div>
                  </div>
                </li>
              </div>
            <?php } ?>
          </ul>
          </div>
      </div>
    </div>
  </div>
</div>
