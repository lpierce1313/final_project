<?php include_once 'mysql_connection.php'; ?>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <?php if($home == 0){ ?>
      <a class="navbar-item" href="../final_project">
    <?php } else { ?>
      <a class="navbar-item" href="">
    <?php } ?>
    <p id="taskName">Tasks Manager</p><i class="fa fa-tasks fa-lg" aria-hidden="true" id="taskIcon"> </i>
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <?php if($home == 0){ ?>
        <a class="navbar-item" href="../final_project">

      <?php } else { ?>
        <a class="navbar-item" href="">
      <?php } ?>
        Home
      </a>
      <?php if(loggedIn()) { ?>
        <a class="navbar-item" href="./tasks.php">
          Tasks
        </a>
      <?php } ?>
      </div>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php if(loggedIn()) { ?>
            <a class="button is-primary" href="./create_task.php">
              <strong>New Task</strong>
            </a>
            <a class="button is-light" href="./logout.php">
              Log out
            </a>
            <a class="button is-light" href="./change_password.php">
              Change Password
            </a>
          <?php } else { ?>
            <a class="button is-primary" href="./signup.php">
              <strong>Sign up</strong>
            </a>
            <a class="button is-light" href="./login.php">
              Log in
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</nav>