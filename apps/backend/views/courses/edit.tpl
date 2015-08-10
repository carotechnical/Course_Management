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
        {{ form('/admin/' ~ controller ~ '/' ~ action, 'method': 'post', 'class': 'form-horizontal') }}
        <fieldset>
            {% if data is not null %}
            <legend class="lead">{{ t._('Update')}}</legend>
            <input type="hidden" name="id" value="{{ data.id }}">
            {% else %}
            <legend class="lead">{{ t._('Add new') }}</legend>
            {% endif %}
            <div class="control-group ">
                <label class="control-label">Tên khóa học/Hội thảo <span class="required">*</span></label>
                <div class="controls">
                    <input id="current-username-control" name="name" class="span9" type="text" value="{% if data is not null %}{{ data.name }}{% endif %}">
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Tổ chức đào tạo <span class="required">*</span></label>
                <div class="controls">
                    <?php
                        $model_path = '\\Modules\Backend\Models\\Organizations';
                        $model = new $model_path();
                        $options = $model::find()
                        ?>

                    {% if data is not null %}
                    {{ select('organization_id', options, 'using': ['id', 'name'], 'value': data.organization_id, 'class': 'span9', 'useEmpty': true) }}
                    {% else %}
                    {{ select('organization_id', options, 'using': ['id', 'name'], 'class': 'span9', 'useEmpty': true) }}
                    {% endif %}
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Lĩnh vực<span class="required">*</span></label>
                <div class="controls">
                    <?php
                        $model_path = '\\Modules\Backend\Models\\Categories';
                        $model = new $model_path();
                        $options = $model::find()
                        ?>

                    {% if data is not null %}
                    {{ select('category_id', options, 'using': ['id', 'name'], 'value': data.category_id, 'class': 'span9', 'useEmpty': true) }}
                    {% else %}
                    {{ select('category_id', options, 'using': ['id', 'name'], 'class': 'span9', 'useEmpty': true) }}
                    {% endif %}
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Nội dung</label>
                <div class="controls">
                    <textarea class="span9" name="description">{% if data is not null %}{{ data.description }}{% endif %}</textarea>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Giảng viên/Diễn giả</label>
                <div class="controls">
                    <?php
                        $model_path = '\\Modules\Backend\Models\\Teachers';
                        $model = new $model_path();
                        $options = $model::find()
                        ?>

                    {% if data is not null %}
                    {{ select('teacher_ids', options, 'using': ['id', 'name'], 'value': data.category_id, 'class': 'span9', 'useEmpty': true) }}
                    {% else %}
                    {{ select('teacher_ids', options, 'using': ['id', 'name'], 'class': 'span9', 'useEmpty': true) }}
                    {% endif %}
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Thời gian</label>
                <div class="controls">
                    <input id="current-username-control" name="spent_time" class="" type="text" value="{% if data is not null %}{{ data.spent_time }}{% endif %}">
                    {% if data is not null %}
                    <select class="span2" name="spent_time_unit">
                        <option value="Day" {% if data.spent_time_unit == 'Day' %}selected="selected"{% endif %} >Ngày</option>
                        <option value="Week" {% if data.spent_time_unit == 'Week' %}selected="selected"{% endif %}>Tuần</option>
                        <option value="Month" {% if data.spent_time_unit == 'Month' %}selected="selected"{% endif %}>Tháng</option>
                        <option value="Year" {% if data.spent_time_unit == 'Year' %}selected="selected"{% endif %}>Năm</option>
                    </select>
                    {% else %}
                    <select class="span2" name="spent_time_unit">
                        <option value="Day">Ngày</option>
                        <option value="Week">Tuần</option>
                        <option value="Month">Tháng</option>
                        <option value="Year">Năm</option>
                    </select>
                    {% endif %}
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Chi phí</label>
                <div class="controls">
                    <input id="current-username-control" name="fee" class="" type="text" value="{% if data is not null %}{{ data.fee }}{% endif %}">
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Địa điểm <span class="required">*</span></label>
                <div class="controls border-box">
                    <div class="list-checkbox">
                        {% if locations is not null %}
                        {% for location in locations %}
                        <div class="checkbox">
                            <label>
                                <i class="icon-chevron-right"></i>
                                <input type="hidden" name="location_id[]" value="{{ location['id'] }}">
                                <input type="hidden" name="location_country[]" value="{{ location['country'] }}">
                                <input type="hidden" name="location_province[]" value="{{ location['province'] }}">
                                <input type="hidden" name="location_district[]" value="{{ location['district'] }}">
                                <input type="hidden" name="location_address[]" value="{{ location['address'] }}">
                                <input type="hidden" name="location_deleted[]" value="0">
                                <span>{{ location['address'] ~ ', ' ~ location['district'] ~ ', ' ~ location['province'] ~ ', ' ~ location['country'] }}</span>
                                <a href="javascript:void(0)" onclick="return location_remove(this);"><i class="icon-remove"></i></a>
                            </label>
                        </div>
                        {% endfor %}
                        {% endif %}
                        <div>
                            <a href="javascript:void(0)"
                               onclick="$(this).parent().find('.hidden-box').show();return false;">+ Tạo địa điểm
                                mới</a>

                            <div class="hidden-box">
                                <p>
                                    <label for="hd-country">Quốc gia</label>
                                    <select id="hd-country" class="not-empty">
                                        <option value="Việt Nam">Việt Nam</option>
                                        <option value="Lào">Lào</option>
                                        <option value="Campuchia">Campuchia</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="hd-province">Tỉnh/Thành phố</label>
                                    <select id="hd-province" class="not-empty">
                                        <option value="">-chọn-</option>
                                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                        <option value="Đồng Nai">Đồng Nai</option>
                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="hd-district">Quận/Huyện</label>
                                    <select id="hd-district" class="not-empty">
                                        <option value="">-chọn-</option>
                                        <option value="1">Quận 1</option>
                                        <option value="Bình Thạnh">Bình Thạnh</option>
                                        <option value="7">Quận 7</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="hd-address">Địa chỉ</label>
                                    <textarea id="hd-address"></textarea>
                                </p>

                                <p>
                                    <button type="button" id="hd-submit-address" class="btn btn-success">Lưu
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group ">
                <label class="control-label">Ngày khai giảng</label>
                <div class="controls">
                    <input id="current-password-control" name="start_date" class="datepicker" type="text" value="{% if data is not null %}<?php echo date('d/m/Y', strtotime($data->start_date)); ?>{% endif %}">
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Ghi chú</label>
                <div class="controls">
                    <textarea class="span9" name="note">{% if data is not null %}{{ data.note }}{% endif %}</textarea>
                </div>
            </div>

        </fieldset>

        <footer id="submit-actions" class="form-actions">
            <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Save</button>
            <button type="submit" class="btn" name="action" value="CANCEL">Cancel</button>
        </footer>
        {{ end_form() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#hd-submit-address').click(function(){
            var country     = $('#hd-country').val();
            var province    = $('#hd-province').val();
            var district    = $('#hd-district').val();
            var address     = $('#hd-address').val();
            if(country == '' || province == '' || district == '' || address == ''){
                alert('Vui lòng nhập đầy đủ thông tin địa chỉ');
                return false;
            }
            var html = '<div class="checkbox">'
                    +'<label>'
                    +'<i class="icon-chevron-right"></i>'
                    +'<input type="hidden" name="location_id[]" value="">'
                    +'<input type="hidden" name="location_country[]" value="'+country+'">'
                    +'<input type="hidden" name="location_province[]" value="'+province+'">'
                    +'<input type="hidden" name="location_district[]" value="'+district+'">'
                    +'<input type="hidden" name="location_address[]" value="'+address+'">'
                    +'<input type="hidden" name="location_deleted[]" value="0">'
                    +'<span>'+address+', '+district+', '+province+', '+country+'</span>'
                    +'<a href="javascript:void(0)" onclick="return location_remove(this)"><i class="icon-remove"></i></a>'
                    +'</label>'
                    +'</div>';
            $(this).parents('.list-checkbox').prepend(html);
            $(this).parents('.hidden-box').hide();
            $(this).parents('.hidden-box').find('select, textarea').val('');
        });
    });

    function location_remove(obj)
    {
        $(obj).parent().parent().hide();
        $(obj).parent().find('input[name="location_deleted[]"]').val('1');
        return false;
    }
</script>