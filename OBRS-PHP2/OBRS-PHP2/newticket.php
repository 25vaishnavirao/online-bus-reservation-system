
<style>
    body {
        background-image: url(./assets/img/bsimgstat.png);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<section id="" class="d-flex align-items-center">
    <div class="container">
        <center>
            <br>
            <h1 class="highlight">Online Bus Reservation System</h1>
        </center>
        <center>
            <?php if (!isset($_SESSION['login_id'])): ?>
                <button class="btn btn-danger btn-lg" type="button" id="book_now">Reserve Your Tickets Now</button>
            <?php else: ?>
                <br><br><br>
                <h2 class="highlight2">Welcome, <?php echo $_SESSION['login_name']; ?></h2>
            <?php endif; ?>
        </center>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->
<script>
    $(document).ready(function(){
        $('#book_now').click(function(){
            $.ajax({
                url: 'book_filter.php', // URL of the PHP script to fetch data from
                type: 'GET', // HTTP method
                dataType: 'html', // Expected data type
                success: function(response) {
                    // Replace the content of the current page with the response from book_filter.php
                    $('body').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>