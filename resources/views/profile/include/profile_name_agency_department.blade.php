<img class="rounded-circle" src="{{ asset('images/')."/".Auth::user()->IMG }}" alt=""
style="width: 50%;">
<h5 class="my-3">{{ Auth::user()->NAME }}</h5>
<p class="text-muted mb-1"><b>Department:</b> {{ Auth::user()->DEPARTMENT }}</p>
<p class="text-muted mb-4"><b>Position:</b> {{ Auth::user()->POSITION }}</p>
