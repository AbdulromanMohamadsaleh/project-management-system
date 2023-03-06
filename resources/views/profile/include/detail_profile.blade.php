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
        <p class="text-muted mb-0">{{ Auth::user()->Profile->NICKNAME }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <b class="mb-0">ID Card:</b>
    </div>
    <div class="col-sm-9">
        <p class="text-muted mb-0">{{ Auth::user()->Profile->CARD_ID }}</p>
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
        <p class="text-muted mb-0">{{ Auth::user()->Profile->TELEPHONE }}</p>
    </div>
</div>
<hr>
