<nav>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
            data-bs-target="#nav-addnote-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-home"
            aria-selected="true">Add</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
            data-bs-target="#nav-editnote-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-profile"
            aria-selected="false">Edit</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
            data-bs-target="#nav-shownote-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-contact"
            aria-selected="false">Show</button>

    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-addnote-{{ $task->TASK_ID }}" role="tabpanel"
        aria-labelledby="nav-home-tab" tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('category.save') }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <label class="label-left fw-bold mb-2" for="projectName">Add note</label>
                    <input value="{{ $task->TASK_BUDGET }}" type="number" name="category_name" class="form-control"
                        id="projectName">
                </div>
                <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
            </div>

        </form>
    </div>
    <div class="tab-pane fade" id="nav-editnote-{{ $task->TASK_ID }}" role="tabpanel" aria-labelledby="nav-profile-tab"
        tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('category.save') }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <label class="label-left fw-bold mb-2" for="projectName">Edit note</label>
                    <input value="{{ $task->TASK_BUDGET }}" type="number" name="category_name" class="form-control"
                        id="projectName">
                </div>
                <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
            </div>

        </form>
    </div>
    <div class="tab-pane fade" id="nav-shownote-{{ $task->TASK_ID }}" role="tabpanel" aria-labelledby="nav-contact-tab"
        tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('category.save') }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <label class="label-left fw-bold mb-2" for="projectName">Show note</label>
                    <p>asdasdasasdasdasdasdasdasdasdasdasdasdasdasdasddddddddddddddddddddddddddddddddddddddddddddd</p>
                </div>
            </div>

        </form>
    </div>

</div>
