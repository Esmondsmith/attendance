<div id="footer" class="p-3 bg-primary text-white fixed-bottom">
 <p> <?php echo "Copyright " . "&copy", date("Y"); ?>. IT Conference</p>
</div>

<!-- To centralize the form we open a  div in the header and close it here in the footer-->
</div>  
    
    <script src="../jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
    //Here, i used a datepicker function from jqueryui.com
       $( function() {
            $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            //To extend the year range for date calender
            yearRange: "-80:+0",
            //To change the date format to Year/Month/Day.
            dateFormat: "yy-mm-dd"
            });
        });
    </script>

  </body>
</html>

