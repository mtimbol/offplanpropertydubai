@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="/css/editor.css" />
@endsection

@section('content')
	<h1>Edit Developer</h1>

	<form method="POST" action="{{ route('dashboard.developers.update', $developer->id) }}">
		{{ csrf_field() }}
		{!! method_field('PUT') !!}

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name" class="control-label">Developer Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ $developer->name }}" />
					@if( $errors->has('name') )
						<span class="help-block">
							{{ $errors->first('name') }}
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
					<label for="slug" class="control-label">Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" value="{{ $developer->slug }}" placeholder="developer-name" />
					@if( $errors->has('slug') )
						<span class="help-block">
							{{ $errors->first('slug') }}
						</span>
					@endif
				</div>
			</div>
		</div>

		<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
			<label for="country_id" class="control-label">Country</label>
			<select name="country_id" class="form-control">
				@foreach( $countries as $country )
					<option value="{{ $country->id }}" {{ $developer->country->id === $country->id ? 'selected' : '' }}>
						{{ $country->name }}
					</option>
				@endforeach
			</select>
			@if( $errors->has('country_id') )
				<span class="help-block">
					{{ $errors->first('country_id') }}
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
			<label for="website" class="control-label">Website URI</label>
			<input type="text" name="website" id="website" class="form-control" value="{{ $developer->website }}" />
			@if( $errors->has('website') )
				<span class="help-block">
					{{ $errors->first('website') }}
				</span>
			@endif
		</div>

		<div class="form-group">
			<label for="profile" class="control-label">Profile</label>
			<textarea name="profile" id="editor" class="form-control">
				{!! $developer->profile !!}
			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-primary">
				<i class="fa fa-save"></i> Update
			</button>
		</div>
	</form>
@endsection

@section('footer_scripts')
	<script src="/js/editor.js"></script>
@endsection