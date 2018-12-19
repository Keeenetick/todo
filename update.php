

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TODO</title>
		<!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" >
	</head>
<body>

	<div class="container" >
		<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-5 col-lg-offset-3 col-lg-5">
			<h2>ToDo App</h2>
            <!-- Form Starts Here -->
        <form action="update.php" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" name = "update" value = "<?php echo $_GET['name'];?>">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit" name = "button" 
							class="glyphicon glyphicon-plus">Обновить</button>
							<button class="btn btn-danger" type="submit" name = "deleteall" 
							class="glyphicon glyphicon-plus">Удалить все задания</button>
					</span>
					
				</div><!-- /input-group -->
				</form>

			<hr/>
			<!-- Form Ends Here -->

            <?php if (is_array($list) || is_object($list)): ?>
            <?php foreach ($list as $lists):?> 
			<ul class="list-group" >
				<li class="list-group-item clearfix task"> 
					<p class="lead"><?=$lists['name'];?></p>
					<div>
						<span class="pull-right">
							<button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" 
								></span></button>
							<button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-ok" 
								></span></button>
                            <a href = "index.php?id=<?=$lists['id'];?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-repeat" 
								></span></a>
							<a href = "delete.php?id=<?= $lists['id'];?>" class="btn btn-danger btn-xs" type = "submit" name = "delete"><span class="glyphicon glyphicon-remove" 
								></span></a>
						</span>
                    </div>
				</li>
            </ul>
            <?php endforeach;?>
<?php endif;?>
			<!-- Task List Ends Here -->
		</div>
	</div>
	<br/>
	
</body>
</html>