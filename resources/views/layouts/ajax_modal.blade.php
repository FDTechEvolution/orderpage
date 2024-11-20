<div class="modal-header">
    <h4 class="modal-title" id="staticBackdropLabel">@isset($title)
        {{ $title }}
        @endisset</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

@yield('content')
@yield('script')