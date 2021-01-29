@if (session('success'))
    <div class="message message--success">
        <p>{{ $status }}</p>
    </div>    
@endif