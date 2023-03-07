<button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal"
    data-bs-target="#Modal{{ $Holyday->HOLYDAY_ID }}">
    <i class="fas fa-pencil-alt" style="font-size: 15px;">
    </i></button>

<!-- The Modal -->
<div class="modal" id="Modal{{ $Holyday->HOLYDAY_ID }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Holiday</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit_holy_day_form" class="formCustom" method="post"
                    action="{{ route('holyday.update', $Holyday->HOLYDAY_ID) }}">
                    @csrf
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="holyday_name">Holiday Name</label>
                            <input type="text" name="edit_holyday_name" class="form-control" id="holyday_name"
                                value="{{ $Holyday->HOLYDAY_NAME }}">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="target">Holiday Date</label>
                            <input type="date" name="edit_create_date_holyday" value="{{ $Holyday->HOLYDAY_DATE }}"
                                class="form-control" id="target">
                        </div>
                        <input name="year" type="number" value="{{ $Holyday->year }}" hidden>
                        {{-- <input type="text" value="{{ $Holyday->HOLYDAY_ID }}"> --}}
                        <button id="submitCreateHolyDay" type="buttom" name="submit"
                            class="btn btn-success">SAVE</button>
                    </div>
            </div>
            <!-- end previous / next buttons -->
            </form>
        </div>

        <!-- Modal footer -->

    </div>
</div>
