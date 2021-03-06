

@extends('layouts.app')

@section('pageTitle', $developer->name)

@section('content')
	<div class="container Developer">
		<div class="row">
			<div class="col-md-12">
				<h1 class="Developer__title">{{ $developer->name }}</h1>
				<div class="Flex">
					<div class="Developer__image Column-4">
						<?php 
							$path = '/images/no-developer-image.jpg';
							if( $developer->photo != '' ) {
								$path = getPhotoPath($developer->photo);
							}
						?>
						<img src="{{ $path }}" 
							alt="{{ $developer->name }}" 
							title="{{ $developer->name }}" 
							class="img-responsive" />
					</div>
					<div class="Developer__description Column-8">
						{!! $developer->profile !!}
					</div>
				</div>
			</div>
			<div class="col-md-3">

			</div>
		</div>
	</div>

	@if( count($developer->projects) > 0 )
		<section class="RelatedProjects is-gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="mb-30 text-center">Projects of {{ $developer->name }}</h3>
					</div>
				</div>
				
				@include('public.projects._listings', [
					'projects' => $developer->projects
				])
			</div>
		</section>
	@endif
@endsection