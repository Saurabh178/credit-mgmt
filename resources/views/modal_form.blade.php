<form method="POST" action="{{route('account_update', [$profile->id])}}">
	@csrf
	<div class="form-group">
		<label>Select Person to Transfer Credit:</label>
		<select name="reciever" class="form-control">
			<option value="none">Select</option>
			@foreach($profiles as $user)
				@if($user->id != $profile->id)
					<option value="{{$user->name}}">{{$user->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Select Amount to Transfer:</label>
		<input type="text" name="amount" class="form-control" required="">
	</div>
	<button type="submit" class="btn btn-success" style="float: right;">Submit</button>
</form>