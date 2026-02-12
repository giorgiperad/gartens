@extends('layouts.basic')

@section('content')
<section class="public-shell">
	<div class="children-wrap">
		<div class="public-hero">
			<div class="hero-inner">
				<div>
					<p class="hero-kicker">{{ $registrationText['title'] }}</p>
					<h1>{{ $registrationText['subtitle'] }}</h1>
					<p>{{ $registrationText['description'] }}</p>
				</div>
				<div class="hero-emblem">
					<img src="{{ asset('images/city-badge.png') }}" alt="City Badge">
				</div>
			</div>
		</div>
		<div class="public-form">
			<div class="public-card">
				<div id="children-form" bla="19"></div>
			</div>
		</div>
	</div>
</section>
@endsection
