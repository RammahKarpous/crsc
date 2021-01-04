<div>
    <h1>{{ Auth::user()->name . ' ' . Auth::user()->family_group->family_name }}</h1>

    <h2>Events</h2>
    <div class="table">
        <div class="row">
            <p>{{ Auth::user() }}</p>
        </div>
    </div>
</div>