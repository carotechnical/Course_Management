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
                            <td>Tổ chức đào tạo</td>
                            <td>
                                <?php
                                            $model_path = '\\Modules\Backend\Models\\Organizations';
                                            $model = new $model_path();
                                            if (!empty($data->organization_id)) {
                                            $options = $model::findFirst($data->organization_id);
                                }
                                ?>

                                {% if options is defined %}
                                    {% set key = model.detail_view['title'] %}
                                    {{ options.readAttribute(key) }}
                                {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td>Lĩnh vực</td>
                            <td>
                                <?php
                                            $model_path = '\\Modules\Backend\Models\\Categories';
                                            $model = new $model_path();
                                            if (!empty($data->category_id)) {
                                            $options = $model::findFirst($data->category_id);
                                }
                                ?>

                                {% if options is defined %}
                                {% set key = model.detail_view['title'] %}
                                {{ options.readAttribute(key) }}
                                {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td>Nội dung</td>
                            <td>{{ data.description }}</td>
                        </tr>
                        <tr>
                            <td>Giảng viên/Diễn giả</td>
                            <td>
                                <?php
                                            $model_path = '\\Modules\Backend\Models\\Teachers';
                                            $model = new $model_path();
                                            if (!empty($data->teacher_ids)) {
                                $options = $model::findFirst($data->teacher_ids);
                                }
                                ?>

                                {% if options is defined %}
                                {% set key = model.detail_view['title'] %}
                                {{ options.readAttribute(key) }}
                                {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td>Thời gian</td>
                            <td>{{ data.spent_time }}
                                {% if data.spent_time_unit == 'Day' %}
                                ngày
                                {% elseif data.spent_time_unit == 'Week' %}
                                tuần
                                {% elseif data.spent_time_unit == 'Month' %}
                                tháng
                                {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td>Chi phí</td>
                            <td>{{ data.fee }}</td>
                        </tr>
                        <tr>
                            <td>Địa điểm</td>
                            <td>
                                {% if locations is not null %}
                                {% for location in locations %}
                                <div class="checkbox">
                                    <label><i class="icon-chevron-right"></i>{{ location['address'] ~ ', ' ~ location['district'] ~ ', ' ~ location['province'] ~ ', ' ~ location['country'] }}</label>
                                </div>
                                {% endfor %}
                                {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày khai giảng</td>
                            <td><?php echo date('d/m/Y', strtotime($data->start_date)); ?></td>
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