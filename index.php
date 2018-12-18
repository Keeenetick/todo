<?php
require "db.php";

$data = $_POST;
if(isset($data['submit'])){
    $errors = array();
    if(trim($data['name']) == ''){
        $errors[] = 'Введите название';
        $list = R::findAll('lists');
    }
    if(R::count('lists',"name = ?", array($data['name']))>0){
        $errors[] = 'Такое задание уже есть';
        $list = R::findAll('lists');
    }
    if(empty($errors)){
        $todo = R::dispense('lists');
        $todo->name = $data['name'];
        R::store($todo);
        echo '<div style="color: green;">Вы успешно создали задание</div><hr>';
        $list = R::findAll('lists');
    }else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>
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
        <form action="/index.php" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" name = "name">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit" name = "submit" 
							class="glyphicon glyphicon-plus">Добавить задание</button>
					</span>
				</div><!-- /input-group -->
            
        </form>
			<hr/>
			<!-- Form Ends Here -->

            <?php if(is_array($list) || is_object($list)):?>
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
                            <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-repeat" 
								></span></button>
							<button class="btn btn-danger btn-xs" name = "delete"><span class="glyphicon glyphicon-remove" 
								></span></button>
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