<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Jaimru Technology Pvt Limited | ERP</span>. <span>All rights reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->

<script>
    var timer, delay = 60000; //1 minutes counted in milliseconds.

    timer = setInterval(function(){
        $.ajax({
            type: 'POST',
            url: 'page_timer.php',
            success: function(responceData){
                //$('.notification').html(responceData);
                if(!empty(responceData))
                {
                    alert('Data: '+responceData);
                }
            }
        });
    }, delay);
</script>