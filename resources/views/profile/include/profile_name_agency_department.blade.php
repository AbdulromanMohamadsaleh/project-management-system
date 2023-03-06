<img class="rounded-circle"
    src="{{ Auth::user()->Profile->IMG ? asset('images/') . '/' . Auth::user()->Profile->IMG : asset('images/') . '/' . 'profile/no_img.png' }}"
    alt="" style="width: 50%;">
<h5 class="my-3">{{ Auth::user()->NAME }}</h5>
<p class="text-muted mb-1"><b>Department:</b> {{ Auth::user()->Profile->DEPARTMENT }}</p>
<p class="text-muted mb-4"><b>Position:</b> {{ Auth::user()->Profile->Position->POS_NAME }}</p>
