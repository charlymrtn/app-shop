@if (session('notificacion'))
    @if (session('status'))
        @if (session('status')=='success')
        <div class="alert alert-success" role="alert">
        @elseif(session('status')=='error')
        <div class="alert alert-danger" role="alert">
        @else
        <div class="alert alert-info" role="alert">
        @endif
    @endif
            {{ session('notificacion') }}
        </div>
@endif
