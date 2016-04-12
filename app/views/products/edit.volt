
<form method="post" autocomplete="off">

    <ul class="pager">
        <li class="previous pull-left">
            {{ link_to("products", "&larr; Go Back") }}
        </li>
        <li class="pull-right">
            {{ submit_button("Save", "class": "btn btn-big btn-success") }}
        </li>
    </ul>

    {{ content() }}

    <div class="center scaffold">
        <h2>Edit Product</h2>

        {#<ul class="nav nav-tabs">#}
            {#<li class="active"><a href="#A" data-toggle="tab">Basic</a></li>#}
            {#<li><a href="#B" data-toggle="tab">Successful Logins</a></li>#}
            {#<li><a href="#C" data-toggle="tab">Password Changes</a></li>#}
            {#<li><a href="#D" data-toggle="tab">Reset Passwords</a></li>#}
        {#</ul>#}

        {#<div class="tabbable">#}
            {#<div class="tab-content">#}
                {#<div class="tab-pane active" id="A">#}

                    {{ form.render("id") }}

                    <div class="span4">

                        <div class="clearfix">
                            <label for="name">Name</label>
                            {{ form.render("name") }}
                        </div>

                        <div class="clearfix">
                            <label for="category_id">Category</label>
                            {{ form.render("category_id") }}
                        </div>

                        <div class="clearfix">
                            <label for="supplier_id">Supplier</label>
                            {{ form.render("supplier_id") }}
                        </div>

                    </div>

                    <div class="span4">

                        <div class="clearfix">
                            <label for="purchase_price">Purchase Price</label>
                            {{ form.render("purchase_price") }}
                        </div>

                        <div class="clearfix">
                            <label for="price">Price</label>
                            {{ form.render("price") }}
                        </div>

                        <div class="clearfix">
                            <label for="active">Confirmed?</label>
                            {{ form.render("active") }}
                        </div>

                    </div>
                </div>


</form>
</div>