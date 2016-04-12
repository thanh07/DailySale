{{ content() }}

<ul class="pager">
    {#<li class="previous pull-left">#}
        {#{{ link_to("products/index", "&larr; Go Back") }}#}
    {#</li>#}
    <li class="pull-right">
        {{ link_to("products/create", "Create Product", "class": "btn btn-primary") }}
    </li>
</ul>
{% for product in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped" align="center">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category name</th>
            <th>Supplier name</th>

            <th>Price</th>
            <th>Purchase Price</th>
            <th>Active</th>
        </tr>
        </thead>
    {% endif %}
    <tbody>
    <tr>
        <td>{{ loop.index}}</td>
        <td>{{ product.name }}</td>
        <td>{{ product.category_name }}</td>
        <td>{{ product.supplier_name }}</td>
        <td>${{ "%.2f"|format(product.price) }}</td>
        <td>${{ "%.2f"|format(product.purchase_price) }}</td>
        <td>{{ product.active }}</td>
        <td width="12%">{{ link_to("products/edit/" ~ product.id, '<i class="icon-pencil"></i> Edit', "class": "btn") }}</td>
        <td width="12%">{{ link_to("products/delete/" ~ product.id, '<i class="icon-remove"></i> Delete', "class": "btn") }}</td>
    </tr>
    </tbody>
    {% if loop.last %}
        <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("products/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }}
                    {{ link_to("products/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}
                    {{ link_to("products/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}
                    {{ link_to("products/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
        <tbody>
        </table>
    {% endif %}
{% else %}
    No products are recorded
{% endfor %}
