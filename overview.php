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
    <!-- <link rel="stylesheet" type="text/css" href="assets/custom.css" /> -->

    <script async src="https://arc.io/widget.min.js#a24jhCmw"></script>


  </head>
  <body>

  <?php

  include('conn.php');


  $id = $_GET['id'];

	$sql = "SELECT * FROM vps WHERE id = $id";


  $result = $conn->query($sql);


  ?>

  <section class="section">
    <div class="container">
      <h1 class="title">
        Benchmarks of VPS Providers
      </h1>
	  <p class="subtitle is-6">
			<i><small>
			This feature is still being developved, expect issues.<br>
			Please contact me on discord if you find bugs.
			</small></i>
		</p>
	  <a href="/" class="button is-primary">Back</a>
	  <br>

			<br>
			<br>
		<?php
      if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		?>
		Link:
		<u><a href="<?php echo $row["link"] ?>"><h2 class='title is-3'><?php echo $row["name"]; ?></h2></a></u>
		<br>

		<h5 class='title is-6'>Personal opinion and extra info:</h5>
		<p class="subtitle is-5"><?php echo $row["description"]; ?></p>
		<hr>
		<div class="columns">
			<div class="column">
				Price:
				<br>
				<p class="content is-large"><strong><?php echo $row["price"]; ?>$</strong></p>
			</div>
			<div class="column">
				Single Core Geekbench:
				<br>
				<p class="content is-large"><strong><?php echo $row["single"]; ?></strong></p>

			</div>
			<div class="column">
				Multi Core Geekbench:
				<br>
				<p class="content is-large"><strong><?php echo $row["multi"]; ?></strong></p>

			</div>
			<div class="column">
				<div><abbr title="Multi Core to Price">CPU/$:</div>

				<span class='tag is-primary is-large'>
				<p class="content is-large"><strong><?php echo round($row["multi"]/$row["price"]); ?></strong></p>
				</span>
			</div>
			<div class="column">
				Architecture:
				<br>
				<p class="content is-large"><strong><?php echo $row["architecture"] ?></strong></p>
			</div>
		</div>


		<br>
		<!-- second row -->
		<div class="columns">
			<div class="column">
				vCores:
				<br>
				<p class="content is-large"><strong><?php echo $row["vcpu"]; ?></strong></p>
			</div>
			<div class="column">
				RAM:
				<br>
				<p class="content is-large"><strong><?php echo $row["ram"]; ?></strong></p>
			</div>
			<div class="column">
				Storage:
				<br>
				<p class="content is-large"><strong><?php echo $row["storage"]; ?></strong></p>
			</div>
			<div class="column">
				Downlink:
				<br>
				<p class="content is-large"><strong><?php echo $row["down"]; ?></strong></p>
			</div>
			<div class="column">
				Uplink:
				<br>
				<p class="content is-large"><strong><?php echo $row["up"]; ?></strong></p>
			</div>
		</div>

		<hr>

		<!-- images -->
		<h3 class="title is-4">
			Yabs output:
		</h3>
		<div class="columns">
			<div class="column">
				<?php

				$yabs_link = $row["yabs"];
				if(empty($yabs_link)){
					echo "No YABS test yet";
				} else {
					echo "<xmp>";
					$yabs = file_get_contents($yabs_link);
					echo $yabs;
					echo "</xmp>";
				}	
				?>
			</div>

		</div>

		<?php

		}
      } else {
          echo "Failed!";
      }
      ?>
  
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


