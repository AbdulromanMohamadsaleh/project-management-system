<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class='fas fa-edit' style="color:orange;"></i>
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signUpForm" enctype="multipart/form-data" method="post"
                    action="{{ route('editprofile', Auth::user()->LOGIN_ID) }}">
                    @csrf
                    <div class="row mb-5 mb-sm-0">
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">NAME:</label>
                            <input type="text" name="name" class="form-control" id="projectName"
                                value="{{ Auth::user()->NAME }}">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">NickName:</label>
                            <input type="text" name="nickname" value="{{ Auth::user()->NICKNAME }}"
                                class="form-control" id="projectName">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">ID Card:</label>
                            <input type="number" minlength="13" maxlength="13" name="Card_Id"
                                value="{{ Auth::user()->CARD_ID }}" class="form-control" id="projectName">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Phone</label>
                            <input type="number" name="phone" minlength="9" maxlength="10"
                                value="{{ Auth::user()->TELEPHONE }}" class="form-control" id="projectName">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label class="label-left fw-bold mb-2" for="projectName">Department:</label>
                            <input type="text" name="Department"
                            {{-- minlength="9" maxlength="10" --}}
                                value="{{ Auth::user()->DEPARTMENT }}" class="form-control" id="projectName">
                        </div>
                        <div class="col-md-6 mb-sm-5">
                            <label for="img" class="label-left fw-bold mb-2">Select image:</label>
                            <input class="form-control" type="file" id="img" name="img" accept="image/*">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
