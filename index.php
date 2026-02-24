<?php 

include('connection.php');
include('header.php');
include('sidebar.php');
?>


<div class="container-fluid" style="background-color: #1a658b;">
	
	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  
        <!-- Indicators -->
        <ol class="left carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
          
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/1.png" alt="..." style="height:280px; width:1600px">
            </div>
        
            <div class="item">
                <img src="images/2.jpg" alt="..." style="height:280px; width:1600px">
            </div>
        
            <div class="item">
                <img src="images/3.jpg" alt="..."style="height:280px; width:1600px">
            </div>

        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
  
    </div>
</div>

<div class="container">
	<div class="row">
	<div class="col-lg-12">
	
<center style="margin: 0px; padding: 60px;">

<h2> Welcome to Health Tracker: Monitor and Record Health Data  </h2>
	<hr>


	
</center>	
	</div>
	</div>
	</div>


<?php 


if (!isset($_SESSION['UserID'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['UserID'];

// Fetch stats
$meal_data = mysqli_query($con, "SELECT category, COUNT(*) as count, SUM(calories) as calories FROM meals WHERE user_id = $user_id GROUP BY category");
$meal_categories = [];
$meal_counts = [];
$meal_calories = [];

while ($row = mysqli_fetch_assoc($meal_data)) {
    $meal_categories[] = $row['category'];
    $meal_counts[] = $row['count'];
    $meal_calories[] = $row['calories'];
}

$exercise_data = mysqli_query($con, "SELECT category, COUNT(*) as count, SUM(calories_burned) as calories FROM exercises WHERE user_id = $user_id GROUP BY category");
$exercise_categories = [];
$exercise_counts = [];
$exercise_calories = [];

while ($row = mysqli_fetch_assoc($exercise_data)) {
    $exercise_categories[] = $row['category'];
    $exercise_counts[] = $row['count'];
    $exercise_calories[] = $row['calories'];
}
?>

<div class="container">
  <h2 class="text-center mt-5">Your Health Stats</h2>

  <div class="row mt-4">
    <div class="col-md-6">
      <h4 class="text-center">Meals by Category</h4>
      <canvas id="mealChart"></canvas>
    </div>
    <div class="col-md-6">
      <h4 class="text-center">Exercises by Category</h4>
      <canvas id="exerciseChart"></canvas>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
      <h4 class="text-center">Calories Consumed</h4>
      <canvas id="caloriesMealChart"></canvas>
    </div>
    <div class="col-md-6">
      <h4 class="text-center">Calories Burned</h4>
      <canvas id="caloriesExerciseChart"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const mealChart = new Chart(document.getElementById('mealChart'), {
  type: 'bar',
  data: {
    labels: <?= json_encode($meal_categories) ?>,
    datasets: [{
      label: 'Meals Count',
      data: <?= json_encode($meal_counts) ?>,
      backgroundColor: '#1a658b'
    }]
  }
});

const exerciseChart = new Chart(document.getElementById('exerciseChart'), {
  type: 'bar',
  data: {
    labels: <?= json_encode($exercise_categories) ?>,
    datasets: [{
      label: 'Exercise Count',
      data: <?= json_encode($exercise_counts) ?>,
      backgroundColor: '#0c9463'
    }]
  }
});

const caloriesMealChart = new Chart(document.getElementById('caloriesMealChart'), {
  type: 'pie',
  data: {
    labels: <?= json_encode($meal_categories) ?>,
    datasets: [{
      label: 'Calories Consumed',
      data: <?= json_encode($meal_calories) ?>,
      backgroundColor: ['#f4a261', '#e76f51', '#2a9d8f', '#264653']
    }]
  }
});

const caloriesExerciseChart = new Chart(document.getElementById('caloriesExerciseChart'), {
  type: 'pie',
  data: {
    labels: <?= json_encode($exercise_categories) ?>,
    datasets: [{
      label: 'Calories Burned',
      data: <?= json_encode($exercise_calories) ?>,
      backgroundColor: ['#ff6b6b', '#4ecdc4', '#ff9f1c', '#3a86ff']
    }]
  }
});
</script>













<?php include ('footer.php'); ?>