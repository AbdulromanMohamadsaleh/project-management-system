<button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal"
    data-bs-target="#Modal{{ $logins->LOGIN_ID }}">
    <i class="fas fa-pencil-alt" style="font-size: 15px;">
    </i></button>

<!-- The Modal -->
<div class="modal" id="Modal{{ $logins->LOGIN_ID }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edit_holy_day_form" class="formCustom" method="post"
                    action="{{ route('user.UpdatePosition', $logins->LOGIN_ID) }}">
                    @csrf
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5 ">
                            <label class="label-left fw-bold mb-2" for="holyday_name">POSITION</label>
                            <select class="form-select" name="position" aria-label="Default select example">
                                @foreach ($positions as $position)
                                    <option {{ $position->POS_ID == $logins->Profile->POS_ID ? 'selected' : '' }}
                                        value="{{ $position->POS_ID }}">{{ $position->POS_NAME }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-6 mb-sm-5 ">
                            <label class="label-left fw-bold mb-2" for="holyday_name">Privilages</label>
                            <select class="form-select" name="privilege" aria-label="Default select example">
                                @foreach ($privileges as $privilege)
                                    <option {{ $privilege->PRIV_ID == $logins->PRIV_ID ? 'selected' : '' }}
                                        value="{{ $privilege->PRIV_ID }}">{{ $privilege->PRI_NAME }}
                                        {{ $privilege->PRI_DESCRIPTION ? ' (' . $privilege->PRI_DESCRIPTION . ')' : '' }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-6 mb-sm-5 ">
                            <label class="label-left fw-bold mb-2" for="holyday_name">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option {{ 0 == $logins->STATUS ? 'selected' : '' }} value="0">Not Active
                                </option>
                                <option {{ 1 == $logins->STATUS ? 'selected' : '' }} value="1">Active
                                </option>
                                <option {{ 2 == $logins->STATUS ? 'selected' : '' }} value="2">Leave
                                </option>
                            </select>

                        </div>
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
