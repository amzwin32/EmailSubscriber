    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
	$('#sendemail').on('submit',function(event){
		event.preventDefault();
		console.log("asd");
		$.ajax({
            type: 'POST',
            url: 'mailer.php',
            data: $('form').serialize(),
            success: function (response) {
				alert(response);
            }
          });
		
	});
    </script>
</body>

</html>