<div class="col-sm-3">
    <p class="mb-0">Full Name</p>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->NAME  }}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
    <p class="mb-0">Nick Name</p>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->NICKNAME }}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
    <p class="mb-0">Card_Id</p>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->CARD_ID }}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
    <p class="mb-0">Email</p>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->EMAIL }}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
    <p class="mb-0">Phone</p>
</div>
<div class="col-sm-9">
    <p class="text-muted mb-0">{{ Auth::user()->TELEPHONE }}</p>
</div>
</div>
<hr>
