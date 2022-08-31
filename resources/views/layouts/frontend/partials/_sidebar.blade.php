@section('side-links')
    {{-- Insert links here --}}
@endsection

@section('side-panels')
    @auth
        @hasCharacter
            @include('layouts.frontend.partials._status')
            @include('layouts.frontend.partials._money')
            @include('layouts.frontend.partials._inventory')
        @endhasCharacter
    @endauth
@endsection
