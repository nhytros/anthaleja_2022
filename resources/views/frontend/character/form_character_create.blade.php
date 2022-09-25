<div class="card shadow mb-2">
    <div class="h4 card-header text-center">{{ __('Character creation') }}</div>
    <div class="card-body">
        <div class="input-group mb-2">
            <span class="input-group-text">{!! getIcon('far', 'id-card') !!}</span>
            <input type="text" class="form-control" name="first_name" placeholder="First Name"
                value="{{ old('first_name') }}" />
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">{!! getIcon('far', 'id-card') !!}</span>
            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                value="{{ old('last_name') }}" />
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">{!! getIcon('fas', 'user') !!}</span>
            <input type="text" class="form-control" name="c_username" placeholder="Username"
                value="{{ old('c_username') }}" />
        </div>
        <div class="btn-group mb-2" role="group" aria-label="Gender button group">
            <span class="input-group-text">{!! getIcon('fas', 'venus-mars') !!}</span>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="gender" id="male" value="M" autocomplete="off"
                    checked />
                <label class="btn btn-outline-primary" for="male">{{ __('Male') }}</label>

                <input type="radio" class="btn-check" name="gender" id="female" value="F"
                    autocomplete="off" />
                <label class="btn btn-outline-pink" for="female">{{ __('Female') }}</label>

                <input type="radio" class="btn-check" name="gender" id="other" value="O"
                    autocomplete="off" />
                <label class="btn btn-outline-purple" for="other">{{ __('Other') }}</label>
            </div>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">{!! getIcon('fas', 'ruler-vertical') !!}</span>
            <input type="number" min="100" max="230" name="height" class="form-control"
                placeholder="Height (in cm)" />
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">{!! getIcon('fas', 'calendar-alt') !!}</span>
            <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth" />
        </div>
        <hr>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" name="social" id="social" checked>
            <label class="form-check-label" for="social">{{ __('Include Social Media Features') }}</label>
        </div>
