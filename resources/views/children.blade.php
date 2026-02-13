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
					<div class="hero-actions">
						<button type="button" class="btn btn-light hero-rules-btn" data-toggle="modal" data-target="#registrationRulesModal">
							წესები
						</button>
					</div>
				</div>
				<div class="hero-emblem">
					<img src="{{ asset('images/city-badge.png') }}" alt="City Badge">
				</div>
			</div>
		</div>

		<div class="modal fade" id="registrationRulesModal" tabindex="-1" role="dialog" aria-labelledby="registrationRulesTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="registrationRulesTitle">რეგისტრაციის წესები</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						{!! nl2br(e($registrationText['rules'])) !!}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">დახურვა</button>
					</div>
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
