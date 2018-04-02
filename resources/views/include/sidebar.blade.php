
<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                <h3>Start Bootstrap</h3>
                <strong>BS</strong>
            </a>
			<!-- Menu Toggle Script -->
			<script>
			$(".sidebar-brand>a").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			</script>  
        </li>
        <li>
            <a href="#" data-toggle="collapse" aria-expanded="false">
            	<i class="fas fa-adjust"></i>
        		Главная
        	</a>
        </li>
        <li>
            <a href="#">
            	<i class="fas fa-adjust"></i>
        		Мой дневник
        	</a>
        </li>
        <li>
            <a href="#">
            	<i class="fas fa-adjust"></i>
        		Профиль
        	</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

