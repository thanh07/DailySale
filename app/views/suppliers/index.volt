{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("suppliers/index", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ link_to("suppliers/create", "Create Supplier", "class": "btn btn-primary") }}
    </li>
</ul>

{% for supplier in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped" align="center">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Contact Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Phone</th>
        </tr>
        </thead>
    {% endif %}
    <tbody>
    <tr>
        <td>{{ loop.index }}</td>
        <td>{{ supplier.name }}</td>
        <td>{{ supplier.contact_name }}</td>
        <td>{{ supplier.address }}</td>
        <td>{{ supplier.city }}</td>
        <td>{{ supplier.phone }}</td>
        <td width="12%">{{ link_to("suppliers/edit/" ~ supplier.id, '<i class="icon-pencil"></i> Edit', "class": "btn") }}</td>
        <td width="12%">{{ link_to("suppliers/delete/" ~ supplier.id, '<i class="icon-remove"></i> Delete', "class": "btn") }}</td>
    </tr>
    </tbody>
    {% if loop.last %}
        <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("suppliers/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }}
                    {{ link_to("suppliers/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}
                    {{ link_to("suppliers/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}
                    {{ link_to("suppliers/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
        <tbody>
        </table>
    {% endif %}
{% else %}
    No suppliers are recorded
{% endfor %}
