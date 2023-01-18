<img class="rounded-circle" src="{{ asset('images/1.png') }}" alt=""
style="width: 32%;">
<h5 class="my-3">{{ Auth::user()->NAME }}</h5>
<p class="text-muted mb-1">Agency: {{ Auth::user()->AGENCY }}</p>
<p class="text-muted mb-4">Position: {{ Auth::user()->POSITION }}</p>
