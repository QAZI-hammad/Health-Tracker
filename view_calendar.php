<?php
include('header.php');
include('sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <center><h2>Reminder Calendar</h2></center>
            <div id="calendar"></div>  <!-- Calendar div -->
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // Fetch reminders for the logged-in user
    var user_id = <?php echo $_SESSION['id']; ?>;  // Pass user_id to JS

    // Initialize FullCalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: function(start, end, timezone, callback) {
            // AJAX request to fetch reminders data
            $.ajax({
                url: 'fetch_reminders.php',  // Call the PHP script to fetch reminders
                data: { user_id: user_id },  // Send the user_id as a GET parameter
                dataType: 'json',
                success: function(data) {
                    var events = [];
                    $(data).each(function() {
                        events.push({
                            title: this.title,  // Reminder title
                            start: this.start,  // Date and time of reminder
                            color: (this.status === 'Completed') ? 'green' : (this.status === 'Pending' ? 'orange' : 'red'),  // Status-based colors
                        });
                    });
                    callback(events);  // Callback function to display the events on the calendar
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching data:', error);  // Log any error
                }
            });
        },
        eventClick: function(event, jsEvent, view) {
            // Alert with event details when clicked
            alert('Reminder: ' + event.title + '\nStatus: ' + event.status);
        }
    });
});
</script>

<?php include('footer.php'); ?>
