<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contact Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div style="width: 500px; margin: 0 auto; margin-top: 90px;">
        <h3>Contact Form</h3>

        @if (Session::has('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ Session::get('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif (Session::has('error'))
			<div class="alert alert-error alert-dismissible fade show" role="alert">
				{{ Session::get('error') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
        @endif

		<div class="alert alert-primary" role="alert">Fields marked with <strong class="text-danger">*</strong> are required.</div>

        <form action="{{ route('contact') }}" method="POST">
            @csrf

            <div class="form-group">
				<?php $validateClass = $errors->has('name') ? 'is-invalid' : ''; ?>

                <label for="name">Your name <strong class="text-danger">*</strong></label>
                <input type="text" name="name" id="name" class="form-control {{ $validateClass }}" placeholder="John Doe" value="{{ old('name') }}" required>

				@if ($errors->has('name'))
					<div class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></div>
				@endif
            </div>

            <div class="form-group">
				<?php $validateClass = $errors->has('email') ? 'is-invalid' : ''; ?>

                <label for="email">Your email address <strong class="text-danger">*</strong></label>
                <input type="email" name="email" id="email" class="form-control {{ $validateClass }}" placeholder="johndoe@gmail.com" value="{{ old('email') }}" required>

				@if ($errors->has('email'))
					<div class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></div>
				@endif
            </div>

            <div class="form-group">
				<?php $validateClass = $errors->has('subject') ? 'is-invalid' : ''; ?>

                <label for="subject">Your subject <strong class="text-danger">*</strong></label>
                <input type="text" name="subject" id="subject" class="form-control {{ $validateClass }}" placeholder="Sample Subject" value="{{ old('subject') }}" required>

				@if ($errors->has('subject'))
					<div class="invalid-feedback"><strong>{{ $errors->first('subject') }}</strong></div>
				@endif
            </div>

            <div class="form-group">
				<?php $validateClass = $errors->has('message') ? 'is-invalid' : ''; ?>

                <label for="message">Enter your message <strong class="text-danger">*</strong></label>
                <textarea name="message" id="message" class="form-control {{ $validateClass }}" rows="3" placeholder="This is a sample message." required>{{ old('message') }}</textarea>

				@if ($errors->has('message'))
					<div class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></div>
				@endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>
