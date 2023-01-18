<div class="stepper-wrapper">
    <div class="stepper-item {{ in_array('New Release', $status) ? 'completed' : 'active' }}">
        <div class="step-counter">1</div>
        <div class="step-name">New Release</div>
    </div>
    <div class="stepper-item {{ in_array('Approved', $status) ? 'completed' : 'active' }}">
        <div class="step-counter">2</div>
        <div class="step-name">Approved</div>
    </div>
    <div class="stepper-item {{ in_array('Progress', $status) ? 'completed' : 'active' }}">
        <div class="step-counter">3</div>
        <div class="step-name">Progress</div>
    </div>
    <div class="stepper-item {{ in_array('Completed', $status) ? 'completed' : 'active' }}">
        <div class="step-counter">4</div>
        <div class="step-name">Completed</div>
    </div>
</div>
