	<!--  Superior bar -->
	<div class="header-upbar">
		<div class="container">
			<div class="telephone float-left">{{ $contact->phone }}</div>
			<div class="social-top">
				<span><i class="fa fa-envelope"></i>{{ $contact->email }}</span><span class="color"><span class="separator">/
				<div class="social-icons">

					@if ($contact->facebook_id != null)
					<a href="{{ $contact->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a>
					@endif
					@if ($contact->instagram_id != null)
					<a href="{{ $contact->instagram_id }}" target="_blank"><i class="fa fa-instagram"></i></a>
					@endif
					@if ($contact->twitter_id != null)
					<a href="{{ $contact->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a>
					@endif
					@if ($contact->linkedin_id != null)
					<a href="{{ $contact->linkedin_id }}" target="_blank"><i class="fa fa-youtube"></i></a>
					@endif
					{{-- <a class="find-top" href="#"><i class="fa fa-search"></i></a> --}}
				</div>
			</div>
		</div>
	</div>

	