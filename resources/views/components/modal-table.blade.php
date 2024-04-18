@props(['val' => ''])
<div id="sample-modal{{ $val }}" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">{{ $title }}</p>
        </header>
        <section class="modal-card-body">
            {{ $slot }}
        </section>
        <footer class="modal-card-foot">
            {{ $buttons }}

        </footer>
    </div>
</div>
