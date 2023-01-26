<div class="col-sm-3">
    <b class="mb-0">Full Name</b>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->NAME }}</p>
</div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <b class="mb-0">NickName:</b>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">{{ Auth::user()->NICKNAME }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <b class="mb-0">ID Card:</b>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">{{ Auth::user()->CARD_ID }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <b class="mb-0">Email:</b>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">{{ Auth::user()->EMAIL }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <b class="mb-0">Phone:</b>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">{{ Auth::user()->TELEPHONE }}</p>
    </div>
</div>
<hr>
