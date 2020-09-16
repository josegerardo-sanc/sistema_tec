<?php 
include 'plantilla/cabeza.php';
 ?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Principal</li>
			</ol>
		</div><!--/.row-->		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12">
					<div class="container">
				        <div class="row">
				            <div class="col-md-12">
				                 <h1 align=center>Bienvenido <?php  echo $au[1]; ?></h1>
								 <br>
								 <br>

				                <h2 align=center><font color="red"><?php echo $au[6]; ?></font></h2>
								<br>
								<br>

					<center>
				    <img src="../img/servicios.jpg" width="50%" alt="50" />
					</center>
					<br>
					<br>
					<br>
				            </div>
				        </div>
				    </div>
				</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>	<!--/.main-->
<?php 
include 'plantilla/pies.php';
 ?>