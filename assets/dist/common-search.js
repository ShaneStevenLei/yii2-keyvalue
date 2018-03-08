var load_modal = '<!-- 加载动画 -->'
    + '<div class="modal loading-modal" id="loading-modal"  tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" keyboard="false">'
    + '<div class="modal_wrapper">'
    + '<div class="modal-dialog">'
    + '<div class="modal-body">'
    + '<div class="sk-wave">'
    + '<div class="sk-rect sk-rect1"></div>'
    + '<div class="sk-rect sk-rect2"></div>'
    + '<div class="sk-rect sk-rect3"></div>'
    + '<div class="sk-rect sk-rect4"></div>'
    + '<div class="sk-rect sk-rect5"></div>'
    + '</div>'
    + '</div> <!-- ./modal-body -->'
    + '</div> <!-- ./modal-dialog -->'
    + '</div> <!-- ./modal_wrapper -->'
    + '</div> <!-- ./modal -->';

$(document).ready(function(){
    $('body').append(load_modal);
    $('.search-options').click(function() {
        if ($('.search-options-content').is(":hidden")) {
           $('.search-options i').removeClass('fa-arrow-circle-down');
           $('.search-options i').addClass('fa-arrow-circle-up');
           $('.search-options-content').show();
        } else {
           $('.search-options i').removeClass('fa-arrow-circle-up');
           $('.search-options i').addClass('fa-arrow-circle-down');
           $('.search-options-content').hide();
        }
    });
    $('.search-btn').click(function () {
        $(".search-form").attr('action', window.location.pathname).submit();
    });
    $('.reset-btn').click(function(){
        $('.search-options-content input[type="text"]').val('');
        $('.search-options-content input[type="text"]').val('');
        $(".search-options-content select").each(function(){
            $(this).val('');
        });
    });
    $(".datepicker-input").each(function () {
        $(this).datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left",
            language: "zh-CN",
            minView: 2
        });
    });
    $(".datepicker-input-month").each(function () {
        $(this).datetimepicker({
            format: 'yyyy-mm',
            weekStart: 1,
            autoclose: true,
            startView: 3,
            minView: 3,
            forceParse: false,
            language: 'zh-CN'
        });
    });
});