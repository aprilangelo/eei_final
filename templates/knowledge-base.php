<div class="col s12 m12 l12 table-header">
  <div class="row">
    <span class="table-title">Knowledge Base</span>
    <?php if($_SESSION['user_type'] == 'Administrator') {?>
    <a id="addfaq" href="faq-add.php">Add Knowledge Base Article</a>
    <?php } ?>

  </div>
</div>

<div id="knowledge-base">

  <h4>Hi <b><?php echo $_SESSION['first_name'] ?></b>, how can we help you today?</h4>
  <!-- <div class="input-field search_text">
          <input placeholder="Search Here" name="search_text" id="search_text" class="faq" type="search" required>
          <i id="search"class="material-icons">search</i>
          <label class="label-icon" for="search"></label>
  </div> -->
  <div class="input-field search-box2" id="request-form">
    <input placeholder="Search Here" name="search_text" id="search_text" class="faq" type="text" autocomplete="off" required>
    <i id="search"class="material-icons">search</i>
    <label class="label-icon" for="search"></label>
    <div id="result">


    </div>

  </div>
  <br>
    <div class="row">
      <h5>Browse Help Topics</h5>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <i class="large material-icons">storage</i>
            </div>
            <div class="card-content">
              <span class="card-title">Technicals</span>

              <p id="kb">Hardware, Mouse, Keyboard, Monitor, Printers, Scanners, Tablets, etc.</p>
            </div>
            <div class="card-action">
              <a href="faq-list.php?view=technicals">View Technical FAQs</a>
              <?php include 'faq-sorter.php'; ?>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <i class="large material-icons">vpn_lock</i>
            </div>
            <div class="card-content">
              <span class="card-title">Access</span>
              <p id="kb">Hardware access, application access, password change</p>
            </div>
            <div class="card-action">
              <a href="faq-list.php?view=access">View Access FAQs</a>
              <?php include 'faq-sorter.php'; ?>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <i class="large material-icons">network_check</i>
            </div>
            <div class="card-content">
              <span class="card-title">Network</span>
              <p id="kb">Network/Internet Access, Network Equipment - routers, cables etc.</p>
            </div>
            <div class="card-action">
              <a href="faq-list.php?view=network">View Network FAQs</a>
              <?php include 'faq-sorter.php'; ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
