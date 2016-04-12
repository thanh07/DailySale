<form method="post" autocomplete="off">

    <ul class="pager">
        <li class="previous pull-left">
            {{ link_to("suppliers", "&larr; Go Back") }}
        </li>
        <li class="pull-right">
            {{ submit_button("Save", "class": "btn btn-success") }}
        </li>
    </ul>

    {{ content() }}

    <div class="center scaffold">

        <h2>Edit Supplier</h2>

        <div class="tab-content">
            <div class="tab-pane active" id="A">

                {{ form.render("id") }}

                <div class="clearfix">
                    <label for="name">Name</label>
                    {{ form.render("name") }}
                </div>

                <div class="clearfix">
                    <label for="contact_name">Contact</label>
                    {{ form.render("contact_name") }}
                </div>

                <div class="clearfix">
                    <label for="address">Address</label>
                    {{ form.render("address") }}
                </div>
                <div class="clearfix">
                    <label for="city">City</label>
                    {{ form.render("city") }}
                </div>
                <div class="clearfix">
                    <label for="phone">Phone</label>
                    {{ form.render("phone") }}
                </div>
            </div>


        </div>
    </div>

</form>
</div>