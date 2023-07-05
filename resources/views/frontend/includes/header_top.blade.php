	<!--  Superior bar -->
	<div class="header-upbar">
		<div class="container">
			<div class="telephone float-left">{{ $contact->phone }}</div>
			<div class="social-top">
				<span><i class="fa fa-envelope"></i>{{ $contact->email }}</span><span class="color"><span class="separator">/
				<div class="social-icons">
					<a href="{{ $contact->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="{{ $contact->instagram_id }}" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="{{ $contact->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="{{ $contact->linkedin_id }}" target="_blank"><i class="fa fa-youtube"></i></a>
					{{-- <a class="find-top" href="#"><i class="fa fa-search"></i></a> --}}
				</div>
			</div>
		</div>
	</div>

	