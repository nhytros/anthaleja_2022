@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ trans('global.success') }}</h4>
        <div>
            <p>
                <x-fas-check-circle class="me-2" />{{ session('success') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ trans('global.error') }}</h4>
        <div>
            <p>
                <x-fas-exclamation-triangle class="me-2" />{{ session('danger') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ trans('global.warning') }}</h4>=
        <div>
            <p>
                <x-fas-exclamation-circle class="me-2" />{{ session('warning') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ trans('global.info') }}</h4>
        <div>
            <p>
                <x-fas-info-circle class="me-2" />{{ session('info') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('primary'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('primary') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('secondary'))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('secondary') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('light'))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('light') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('dark'))
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('dark') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('pink'))
    <div class="alert alert-pink alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('pink') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('purple'))
    <div class="alert alert-purple alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('purple') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('teal'))
    <div class="alert alert-teal alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('teal') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('indigo'))
    <div class="alert alert-indigo alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('indigo') }}
            </p>
        </div>
    </div>
@endif

@if (Session::has('orange'))
    <div class="alert alert-orange alert-dismissible fade show" role="alert">
        <div>
            <p>
                <x-fas-info class="me-2" />{{ session('orange') }}
            </p>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h4 class="alert-heading">{{ trans('global.error') }}</h4>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
