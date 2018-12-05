<?php
  include("mysql_connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <?php
      include 'head.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  </head>
  <body>
    <?php
      $home = 1;
      include 'header.php';
    ?>
    <hr>
      <section class="form_holder has-text-centered">
        <?php if(!loggedIn()) { ?>
        <h1 class="is-size-3">Welcome to Task Manager <i class="fa fa-tasks" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6">Update, Manage, Delete and View tasks so you can complete all of your tasks on time</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Why you should join? <i class="fa fa-check" aria-hidden="true" id="taskIcon"> </i></h1>
        <br>
        <p class="is-size-6"> View Statistics about your tasks, view a calender displaying various tasks, and mark your tasks as completed to feel accomplished</p>
        <br><br>
        <hr>
        <h1 class="is-size-3">Create an Account <i class="fa fa-user-circle tealColor" aria-hidden="true"></i></h1>
        <br>
        <p class="is-size-6">To create an account, click <a href="./signup.php">here</a></p>
        <br><br><br>
        <hr>
      <?php } else { ?>
        <div style="height:400px; width:400px; margin: 0px auto;">
          <canvas id="myChart" width="400" height="400"></canvas>
          <script>
          var ctx = document.getElementById("myChart").getContext("2d");
          ctx.canvas.width = 400;
          ctx.canvas.height = 400;
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
          </script>
        </div>
      <?php }?>
      </section>
      <br>
      <?php
        include 'footer.php';
      ?>
  </body>
</html>
