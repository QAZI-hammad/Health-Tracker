<?php
include('header.php');
include('sidebar.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['id'];
    $meal_category = $_POST['meal_category'];
    $meal_name = $_POST['meal_name'];
    $calories = $_POST['calories'];
    $timestamp = date('Y-m-d H:i:s');

    $query = "INSERT INTO meals (user_id, category, name, calories, timestamp) 
              VALUES ('$user_id', '$meal_category', '$meal_name', '$calories', '$timestamp')";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Meal logged successfully!');</script>";
        echo "<script>window.location.href='meals.php';</script>";
    } else {
        echo "<script>alert('Error logging meal!');</script>";
    }
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
    
    <h2>Log Your Meal</h2>
    <hr>
    <form method="POST" id="mealForm">
        <div class="form-group">
            <label for="meal_category">Category</label>
            <select class="form-control" id="meal_category" name="meal_category" required>
                <option value="" disabled selected> Choose Category </option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Snack">Snack</option>
            </select>
        </div>

        <div class="form-group">
            <label for="meal_name">Meal Name</label>
            <input type="text" class="form-control" id="meal_name" name="meal_name" placeholder="Meal Name" required>
            <div id="meal-suggestions"></div> <!-- Suggestions will appear here -->
        </div>

        <div class="form-group">
            <label for="calories">Calories</label>
            <input type="number" class="form-control" id="calories" name="calories" placeholder="Calories" required>
        </div>

      

        <button type="submit" class="btn btn-primary">Log Meal</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Auto-suggestion for meal names
    $('#meal_name').on('input', function() {
        var input = $(this).val();
        if(input.length > 2) {  // Start suggesting when the input has more than 2 characters
            $.ajax({
                url: 'fetch_suggestions.php',
                method: 'GET',
                data: { type: 'meal', query: input },
                success: function(response) {
                    $('#meal-suggestions').html(response).show();
                }
            });
        } else {
            $('#meal-suggestions').hide();
        }
    });

    // Select suggestion
    $(document).on('click', '.suggestion', function() {
        $('#meal_name').val($(this).text());
        $('#meal-suggestions').hide();
    });
});
</script>
</div>
</div>


<?php include('footer.php'); ?>
