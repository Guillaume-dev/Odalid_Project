@extends('layouts.gaches')

@section('titre', 'Nouvelle')

@section('type')

<div class="form-group row">
	<label for="nom" class="col-md-4 col-form-label text-md-right">Type</label>
	<div class="col-md-6">
		<select id="type" name="type" required>
			<option value="prd4">PoE rail DIN 4 voies</option>
			<option value="pb3">PoE boitier 3 voies</option>
		</select>
			@if ($errors->has('name'))
					<span class="invalid-feedback">
							<strong>{{ $errors->first('name') }}</strong>
					</span>
			@endif
	</div>
</div>


@endsection
