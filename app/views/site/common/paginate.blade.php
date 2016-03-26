<div class="row">
	<div class="paging paging2">
		<ul>
			{{ with(new Paginate($input))->render() }}
			
			<!-- <li class="previous hidden"><a href="#"><i class="fa fa-caret-left"></i></a></li>
			<li class="current">1</li>
			<li><a href="products_2.html">2</a></li>
			<li><a href="products_3.html">3</a></li>
			<li class="next"><a href="products_2.html"><i class="fa fa-caret-right"></i></a></li> -->
		</ul>
	</div>
</div>