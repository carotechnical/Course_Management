<div class="row">
    <div class="span4">
        <div class="blockoff-right">
            <ul class="nav nav-list">
                <li class="nav-header">{{ t._('Action') }}</li>
                {% for l, m in menu %}
                <li>
                    <a href="{{ url(m) }}">
                        <i class="icon-chevron-right pull-right"></i>
                        {{ l }}
                    </a>
                </li>
                {% endfor %}
            </ul>
        </div>
    </div>
    <div class="span12">
        <div class="box">
            <div class="box-content">
                {% if data is null %}
                <legend class="lead" style="border: none">{{ t._('No Data') }}</legend>
                {% else %}
                <legend class="lead" style="border: none">{{ title }}</legend>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Tên trường</td>
                            <td>{{ data.name }}</td>
                        </tr>
                        <tr>
                            <td>Địa điểm</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Giới thiệu</td>
                            <td>{{ data.description }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ data.website }}</td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td>{{ data.office_phone }}</td>
                        </tr>
                        <tr>
                            <td>Fax</td>
                            <td>{{ data.fax }}</td>
                        </tr>
                        <tr>
                            <td>Giảng viên</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>URL Video giới thiệu</td>
                            <td>{{ data.intro_url }}</td>
                        </tr>
                        <tr>
                            <td>Ghi chú</td>
                            <td>{{ data.note }}</td>
                        </tr>
                    </tbody>
                </table>
                {% endif %}
            </div>
        </div>
    </div>
</div>