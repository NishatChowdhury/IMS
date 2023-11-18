<ul id="nav">
	  <li><a href="{{ url('/') }}">Home</a></li>
	@foreach(menus() as $menu)
	
	  <li class="current">
	  
		<a href="{{ url('page',$menu->uri) }}"> {{ $menu->name }} <i class="{{ $menu->hasChild() ? 'fa fa-angle-down' : '' }}"></i></a>
	@if($menu->hasChild())
		<ul class="sub-menu">
	    @foreach($menu->childrenActive->sortBy('order') as $subMenu)
		  <li>
			
			<a href="{{ $subMenu->url ?: url('page',$subMenu->uri) }}">{{ $subMenu->name }} <i class="{{ $subMenu->hasChild() ? 'fa fa-angle-right' : '' }}"></i></a>
			@if($subMenu->hasChild())
	        <ul class="subdrop">
              @foreach($subMenu->childrenActive->sortBy('order') as $subSubMenu)
			  <li><a href="{{ url('page',$subSubMenu->uri) }}">{{ $subSubMenu->name }} </a></li>
			  
			  @endforeach
			</ul>
			@endif
		  </li>
		@endforeach  
		 
		</ul>
	@endif
	  </li>
	@endforeach

	 <!-- <li>
		<a href="#">Team <i class="fa fa-angle-down"></i></a>
		<ul class="sub-menu">
		  <li><a href="ManagingComt.html"> Managing Committee </a></li>
		  <li><a href="teacher.html"> Teachers </a></li>
		  <li>
			<a href="Staff.html">Staff</a>
		  </li>
		  <li>
			<a href="WAPC.html"> Women Abuse Prevention Committee </a>
		  </li>
		  <li>
			<a href="Tswt.html"> Teacher & Staff Welfare Trust </a>
		  </li>
		  <li>
			<a href="TCI.html"> Teachers Council Information </a>
		  </li>

		</ul>
	  </li>
	  <li>
		<a href="teacher.html">Result<i class="fa fa-angle-down"></i></a>
		<ul class="sub-menu">
		  <li>
			<a href="Internalresult.html">Internal Result</a>
		  </li>
		  <li>
			<a href="PublicResult.html">Public Examination</a>
		  </li>
		  <li>
			<a href="onlineAdmission.html">Online Admission</a>
		  </li>
		</ul>
	  </li>
	  <li><a href="gallery.html">Gallery</a></li>
	  <li>
		<a href="index.html">News & Notice<i class="fa fa-angle-down"></i></a>
		<ul class="sub-menu">
		  <li><a href="news.html">Notice & News</a></li>

		</ul>
	  </li>
	  <li>
		<a href="#">Information<i class="fa fa-angle-down"></i></a>
		<ul class="sub-menu">
		  <li>
			<a href="SportsCulturalActivities.html"> Sports & Cultural Program </a>
		  </li>
		  <li>
			<a href="centerInformation.html"> Center Information </a>
		  </li>
		  <li>
			<a href="Scholor.html"> Scholarship Info </a>
		  </li>
		  <li>
			<a href="Bncc.html"> BNCC </a>
		  </li>
		  <li>
			<a href="Rover.html"> Rover Scout </a>
		  </li>
		  <li>
			<a href="tander.html"> Tender </a>
		  </li>
		  <li>
			<a href="Privacy.html"> Privacy Policy </a>
		  </li>
		</ul>
	  </li>
	  <li><a href="contact.html">Contact</a></li>-->
</ul>