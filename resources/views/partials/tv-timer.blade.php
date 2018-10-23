<div class="col-5">
	<div class="card bg-light" style="box-shadow:         inset 0px 0px 13px -8px rgba(50, 50, 50, 1);">
		<span class="lead mt-3">Power-off timer <i class="fas fa-stopwatch"></i></span>
		<div class="w-100"></div>
		<span><input type="time" id="time" step="1" value="00:30:00"> </input>
		<div class="btn-group my-3">
		<button class="btn btn-sm text-light" style="background-color: #57b846;" id="submit" onclick="scheldule()">Scheldule</button>
		<button class="text-danger" style="display:none; background-color: transparent; margin: 0; border: 0;" id="cancel" onclick="cancel()">Cancel</button>
		</div>
		</span>
	</div>
</div>

<script src="{{ asset('js/timer.js') }}"></script>
