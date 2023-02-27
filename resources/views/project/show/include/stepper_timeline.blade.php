<div class="stepper-wrapper">
    <div class="stepper-item {{ $project_detail->STATUS >= 0 ? 'completed' : 'active' }}">
        <div class="step-counter">1</div>
        <div class="step-name">New Release</div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS >= 1 ? 'completed' : 'active' }}">
        <div class="step-counter">2</div>
        <div class="step-name">Approved</div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS >= 2 ? 'completed' : 'active' }}">
        <div class="step-counter">3</div>
        <div class="step-name">Progress</div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS == 3 ? 'completed' : 'active' }}">
        <div class="step-counter">4</div>
        <div class="step-name">Completed</div>
    </div>
</div>
