<div class="parent-view">
    <h1 class="heading--page mt-0 mb-50">Dashboard</h1>

    @yield('person-name')

    <section class="table mb-90">
        <div class="row-6">
            <div class="content-section">
                <h4 class="heading heading--small">Address</h4>
                <p>{{ Auth::user()->family_group->address_line }}</p>
                <p>{{ Auth::user()->family_group->place }}</p>
                <p>{{ Auth::user()->family_group->postcode }}</p>

                <a href="{{ route('family-group.edit', Auth::user()->family_group->slug) }}" class="button button--primary button--rounded mt-20 mr-50">Update details</a>
            </div>

            <div class="content-section">
                <h4 class="heading heading--small">Contact details</h4>
                <p>{{ Auth::user()->family_group->contact_number }}</p>
                <p>{{ Auth::user()->family_group->email }}</p>
            </div>
        </div>
    </section>
</div>