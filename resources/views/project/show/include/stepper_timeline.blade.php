<div class="stepper-wrapper">
    <div class="stepper-item {{ $project_detail->STATUS >= 0 ? 'completed' : 'active' }}">
        <div class="step-counter">1</div>
        <div class="step-name">
            New Release
            @if ($project_detail->STATUS >= 0)
                <i class="bi bi-check-circle-fill icon-green "></i>
            @endif
        </div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS >= 1 ? 'completed' : 'active' }}">
        <div class="step-counter">2</div>
        <div class="step-name">
            Approved
            @if ($project_detail->STATUS >= 1)
                <i class="bi bi-check-circle-fill icon-green "></i>
            @elseif ($project_detail->STATUS == 0)
                <i class="bi bi-clock-fill " style="color: #edb43a"></i>
            @endif
        </div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS >= 2 ? 'completed' : 'active' }}">
        <div class="step-counter">3</div>
        <div class="step-name">
            Progress
            @if ($project_detail->STATUS > 2)
                <i class="bi bi-check-circle-fill icon-green "></i>
            @elseif ($project_detail->STATUS == 2 || $project_detail->STATUS == 1)
                <i class="bi bi-clock-fill " style="color: #edb43a"></i>
            @endif
        </div>
    </div>
    <div class="stepper-item {{ $project_detail->STATUS == 3 ? 'completed' : 'active' }}">
        <div class="step-counter">4</div>
        <div class="step-name">
            Completed
            @if ($project_detail->STATUS == 3)
                <i class="bi bi-check-circle-fill icon-green "></i>
            @endif
        </div>
    </div>
</div>
