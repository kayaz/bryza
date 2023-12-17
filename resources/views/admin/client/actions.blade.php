<a
    href="{{ route('admin.clients.chat.show', $row->id) }}"
    class="btn action-button mr-1"
    data-bs-toggle="tooltip"
    data-bs-title="Chat">
    <i class="fe-mail"></i>
</a>
<a
    href="{{ route('admin.clients.rodo', $row->id) }}"
    class="btn action-button mr-1"
    data-bs-toggle="tooltip"
    data-bs-title="Zgody RODO">
    <i class="fe-check-circle"></i>
</a>
