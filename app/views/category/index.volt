{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("category/index", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ link_to("category/create", "Create Category", "class": "btn btn-primary") }}
    </li>
</ul>

{% for profile in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped" align="center">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        </thead>
    {% endif %}
    <tbody>
    <tr>
        <td>{{ loop.index }}</td>
        <td>{{ profile.name }}</td>
        <td width="12%">{{ link_to("category/edit/" ~ profile.id, '<i class="icon-pencil"></i> Edit', "class": "btn") }}</td>
        <td width="12%">{{ link_to("category/delete/" ~ profile.id, '<i class="icon-remove"></i> Delete', "class": "btn") }}</td>
    </tr>
    </tbody>
    {% if loop.last %}
        <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("category/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }}
                    {{ link_to("category/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}
                    {{ link_to("category/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}
                    {{ link_to("category/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
        <tbody>
        </table>
    {% endif %}
{% else %}
    No category are recorded
{% endfor %}
