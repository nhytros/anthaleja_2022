<div id="carousel" class="carousel carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for ($r = 1; $r <= rand(2, 10); $r++)
            <div class="carousel-item{{ $r == 1 ? ' active' : '' }}">
                <img src="{{ genImage(1400, 400) }}" class="d-block w-100">
            </div>
        @endfor
    </div>
</div>
