			</div>
		</div>
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="../dist/js/bootstrap.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="../dist/js/custom.min.js"></script>
        <!-- Show a thumbnail above the file input -->
        <script>
        //Thumbnail placeholder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail')
                        .attr('src', e.target.result)
                        .width(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
	</body>
</html>