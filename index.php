<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Benchmarks" property="og:title">
    <meta content="Benchmarks and comparison of VPS providers" property="og:description">
    <meta content="https://vps.benji.link" property="og:url">
    <meta content="/assets/controller.png" property="og:image">
    <meta content="#5a43b5" data-react-helmet="true" name="theme-color">
   
    <title>Benchmarks of VPS Providers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/dark-min.css" />
    <link rel="stylesheet" type="text/css" href="assets/custom.css" />

    <script async src="https://arc.io/widget.min.js#a24jhCmw"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
              order: [[6, 'desc']],
              paging: false,
              info: false,
              searching: false
            });
        });
     
    </script>


  </head>
  <body>

  <?php

  include('conn.php');

  $sql = "SELECT * FROM vps";
  $result = $conn->query($sql);

  ?>

  <section class="section">
    <div class="container">
      <h1 class="title">
        Benchmarks of VPS Providers
      </h1>
      <br>

      <p class="subtitle">

      
      All Benchmarks used YABS:<br>
      <a href="https://github.com/masonr/yet-another-bench-script">https://github.com/masonr/yet-another-bench-script</a>
      

      </p>
      <hr>
    

  <table id="myTable" class="table">
  <thead>
    <tr>
      <th onclick="sortTable(0)">Name</th>
      <th onclick="sortTable(1)">Price</th>
      <th onclick="sortTable(2)">Link</th>
      <th onclick="sortTable(3)">Payment</th>
      <th onclick="sortTable(4)">Single</th>
      <th onclick="sortTable(5)">Multi</th>
      <th onclick="sortTable(6)"><abbr title="Multi Core to Price">CPU/$</th>
      <th onclick="sortTable(7)"><abbr title="Single Core to Price">CPU/$</th>
      <th onclick="sortTable(8)">Yabs</th>
      <th onclick="sortTable(9)">RAM</th>
      <th onclick="sortTable(10)"><abbr title="vCores">CPU</th>
      <th onclick="sortTable(11)">Storage</th>
      <th onclick="sortTable(12)">Downlink</th>
      <th onclick="sortTable(13)">Uplink</th>
      <th onclick="sortTable(14)">Architecture</th>
      <th><abbr title="Just some more random info">Extra Info</th>
    </tr>
  </thead>
  <tbody>

      <?php
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

              echo "
              <tr>
              <td><a href='overview.php?type=hourly&id=" . $row["id"]. "'>" . $row["name"]. "</td>
              <td>" . $row["price"]. "$/Month</td>
              <td><a href='" . $row["link"]. "' target='_blank'>Link</a></td>
              <td>" . $row["payment"]. "</td>
              <td>" . $row["single"]. "</td>
              <td>" . $row["multi"]. "</td>
              <td><b>" . round($row["multi"]/$row["price"]). "</b></td>
              <td><b>" . round($row["single"]/$row["price"]). "</b></td>
              <td>";
              
              if($row["yabs"] == ""){
                echo "N/A";
              } else {
                echo " <a href='" . $row["yabs"]. "' target='_blank'>Yabs</a>";
              }

              echo "
              </td>
              <td>" . $row["ram"]. "</td>
              <td>" . $row["vcpu"]. "</td>
              <td>" . $row["storage"]. "</td>
              <td>" . $row["down"]. "</td>
              <td>" . $row["up"]. "</td>
              <td>" . $row["architecture"]. "</td>
              <td>" . $row["info"]. "</td>
              </tr>
              "; 
          }
      } else {
          echo "0 results";
      }
      ?>

  </tbody>
</table>

      </p>
    </div>
  </section>


  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>VPS Benchmarks</strong> by <a href="https://benji.link">Benji</a>.<br>
        If you have any problems or suggestions, please contact me on discord: Benji#1652 <br>
        Email: benjibordne@outlook.com
      </p>
    </div>
  </footer>

  </body>
</html>


