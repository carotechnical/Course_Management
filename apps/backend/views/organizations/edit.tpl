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
                    <label class="control-label">Tên tổ chức đào tạo <span class="required">*</span></label>
                    <div class="controls">
                        <input id="current-username-control" name="name" class="span9" type="text" value="{% if data is not null %}{{ data.name }}{% endif %}">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Địa điểm <span class="required">*</span></label>
                    <div class="controls border-box">
                        <div class="list-checkbox">
                            <!--<div class="checkbox">
                                <label>
                                    <i class="icon-chevron-right"></i>
                                    <input type="hidden" name="location_nation[]" value="">
                                    <input type="hidden" name="location_district[]" value="">
                                    <input type="hidden" name="location_ward[]" value="">
                                    <input type="hidden" name="location_address[]" value="">
                                    <span>27B, Nguyễn Đình Chiểu, P1, Q.1, Hồ Chí Minh</span>
                                    <a href=""><i class="icon-remove"></i></a>
                                </label>
                            </div>-->
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
                    <label class="control-label">Giới thiệu</label>
                    <div class="controls">
                        <textarea class="span9" name="description">{% if data is not null %}{{ data.description }}{% endif %}</textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Website</label>
                    <div class="controls">
                        <input id="current-password-control" name="website" class="span9" type="text" value="{% if data is not null %}{{ data.website }}{% endif %}">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Điện thoại</label>
                    <div class="controls">
                        <input id="current-status-control" name="office_phone" class="span9" type="text" value="{% if data is not null %}{{ data.office_phone }}{% endif %}">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Fax</label>
                    <div class="controls">
                        <input id="current-status-control" name="fax" class="span9" type="text" value="{% if data is not null %}{{ data.fax }}{% endif %}">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Mạng xã hội</label>
                    <div class="controls">
                        <textarea class="span9" name="social_link">{% if data is not null %}{{ data.social_link }}{% endif %}</textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Giảng viên</label>
                    <div class="controls">
                        <textarea class="span9" name="teacher">{% if data is not null %}{{ data.teacher }}{% endif %}</textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Hình ảnh trường</label>
                    <div class="controls">
                        <span class="btn btn-default btn-file">
                            Browse <input type="file">
                        </span>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">URL Video giới thiệu</label>
                    <div class="controls">
                        <input id="current-status-control" name="intro_url" class="span9" type="text" value="{% if data is not null %}{{ data.intro_url }}{% endif %}">
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
                      +'<span>'+address+', '+district+', '+province+', '+country+'</span>'
                      +'<a href="javascript:void(0)" onclick="$(this).parent().parent().remove();"><i class="icon-remove"></i></a>'
                      +'</label>'
                      +'</div>';
            $(this).parents('.list-checkbox').prepend(html);
            $(this).parents('.hidden-box').hide();
            $(this).parents('.hidden-box').find('select, textarea').val('');
        });
    });
</script>