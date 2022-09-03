<?php 

	include "../app/usersController.php";

	$usersController = new UsersController();

	$users = $usersController -> get();

	//echo json_encode($users);
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		Users
	</title>
	<link rel="stylesheet" href="../css/estilosdatosMovies.css?v=0.0.13">
    <link rel="stylesheet" href="../css/estilosIndex.css?v=0.0.10">
	<style type="text/css">
		
		#updateForm{
            display: none;
        }
	</style>
</head>
<body>


	<div class="contenedor">
		<!--===============================
            INICIO DEL HEADER DE LA PAGINA
        ===================================-->
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="#">Anzu Dashboard</a>
                    
                </div>
                <nav>
					<a href="../dashboard/dashboard.php">Inicio</a>
                    <a href="../movies">Movies</a>
                    <a href="../users">Clients</a>
                    <a href="../categories">Category</a>
                    <a href="../app/salir.php">Salir</a>
                    
                </nav>
            </div>
        </header>
        <!--===============================
            FIN DEL HEADER DE LA PAGINA
        ===================================-->




		<div class="contenedortabla">
			<h1>
				Clients 
			</h1>
			<table>
				<thead>
					<th>
						#
					</th>
					<th>
						name
					</th>
					<th>
						email
					</th>
					<th>
						password
					</th>
					<th>
						role
					</th>
					<th>
						Action
					</th>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>

						<tr>
							
							<td class="centrar">
								<?= $user['id'] ?>
							</td>
							<td class="centrar">
								<?= $user['name'] ?>
							</td>
							<td class="centrar"> 
								<?= $user['email'] ?>
							</td>
							<td class="centrar">
								<?= $user['password'] ?>
							</td>
							<td class="centrar">
								<?= $user['role'] ?>
							</td>
							<td>
								<button onclick="edit(<?= $user['id'] ?>,'<?= $user['name'] ?>','<?= $user['email'] ?>','<?= $user['password'] ?>','<?= $user['role'] ?>')">
									Edit 
								</button>
								<button onclick="remove(<?= $user['id'] ?>)" style="color: white; background: red;">
									Delete 
								</button>
							</td>
							

						</tr>

					<?php endforeach ?>

					<?php 

					?> 

					
					
				</tbody>
			</table>

			<h1>
                Agregar / Modificar
			</h1>
			<?php 
				if (isset($_SESSION) && isset($_SESSION['error'])) {

					echo "<h3> Error: ".$_SESSION['error']."</h3>";
					unset($_SESSION['error']);
	
				}
			
			?>

			<?php include "../layouts/alerts.template.php"; ?>			
			
			<form id="storeForm" action="../app/usersController.php" method="POST">
				<fieldset class="fielset">

					<legend>
						Add new User
					</legend>
					
					<label>
						name
					</label><br><br>
					<input type="text" name="name" placeholder="type" required=""> <br> <br>

					
					<label>
						email
					</label><br><br>
					<input type="text" name="email" placeholder="type" required=""> <br><br>

					<label>
						password
					</label><br><br>
					<input type="text" name="password" placeholder="type" required=""> <br><br>

					<label>
						role
					</label><br><br>
					<input type="text" name="role" placeholder="type" required=""> <br><br>

					

					<button type="submit"> save User</button>
					<input type="hidden" name="action" value="store">


				</fieldset>
			</form>		
			
			<form id="updateForm" action="../app/usersController.php" method="POST">
				<fieldset class="fielset">

					<legend>
						Edit new User
					</legend>
					
					<label>
						name
					</label><br><br>
					<input type="text" id="name" name="name" placeholder="type" > <br> <br>

					
					
					<label>
						email
					</label><br><br>
					<input type="text" id="email" name="email" placeholder="type" > <br><br>

					<label>
						password
					</label><br><br>
					<input type="text" id="password" name="password" placeholder="type" > <br><br>

					<label>
						role
					</label><br><br>
					<input type="text" id="role" name="role" placeholder="type" > <br><br>


				

					

					<button type="submit"> save User</button>
					<input type="hidden" name="action" value="update">
					<input type="hidden" name="id" id="id">


				</fieldset>
			</form>	
			
			<form id="destroyForm" action="../app/usersController.php" method="POST">
						
				<input type="hidden" name="action" value="destroy">
                <input type="hidden" name="id" id="id_destroy">
			</form>

		</div>

		<!--===============================
            INICIO DEL FOOTER DE LA PAGINA
        ===================================-->
        <footer>
            <div class="wrapper">
                <div class="logo">
                    <a href="index.php">© copyright by Jesus Alan Hernandez Rodarte </a>
                    
                </div>
                <nav >
                    <a href="#">
                        <img src="../img/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/twit.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/instagram.png" alt="">
                    </a>
                    <a href="#">
                        <img src="../img/google.png" alt="">
                    </a>
                    
                    
                </nav>
            </div>
        </footer>
        <!--===============================
            FIN DEL FOOTER DE LA PAGINA
        ===================================-->


	</div>

	<script type="text/javascript">

	function edit(id,name,email,password,role){

		document.getElementById('storeForm').style.display="none";
        document.getElementById('updateForm').style.display="block";

		document.getElementById('name').value=name
		document.getElementById('email').value=email
		document.getElementById('password').value=password
		document.getElementById('role').value=role
		
		document.getElementById('id').value=id

	}

	function remove(id){

		var confirm = prompt("Si quiere eliminar el registro, escriba: "+ id);

		if(confirm == id){

		document.getElementById('id_destroy').value=id;
		document.getElementById('destroyForm').submit();


		}
	}

	</script>

	

</body>
</html>