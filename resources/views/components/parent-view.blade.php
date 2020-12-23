<div class="parent-view">
    <h1 class="heading--page mt-0 mb-50">Dashboard</h1>

    @yield('person-name')

    <section class="table mb-90">
        <div class="row-6">
            <div class="content-section">
                <p class="heading heading--small">Address</p>
                <p>{{ Auth::user()->family_group->address_line }}</p>
                <p>{{ Auth::user()->family_group->place }}</p>
                <p>{{ Auth::user()->family_group->postcode }}</p>

                <a href="" class="button button--primary button--rounded mt-20 mr-50">Update details</a>
            </div>

            <div class="content-section">
                <p class="heading heading--small">Contact details</p>
                <p>{{ Auth::user()->family_group->contact_number }}</p>
                <p>{{ Auth::user()->family_group->email }}</p>
            </div>
        </div>
    </section>

    <section>
        <h2 class="heading heading--section">All family members</h2>

    </section>
</div>