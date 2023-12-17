<div class="card-header card-nav">
    <nav class="nav">
        <a
            class="nav-link {{ Request::routeIs('admin.clients.rodo') ? ' active' : '' }}"
            href="{{ route('admin.clients.rodo', $client->id) }}">
            <span class="fe-check-circle"></span> Zgody
        </a>
        <a
            class="nav-link {{ Request::routeIs('admin.clients.chat.*') ? ' active' : '' }}"
            href="{{ route('admin.clients.chat.show', $client->id) }}">
            <span class="fe-mail"></span> Wiadomości
        </a>
    </nav>
</div>
