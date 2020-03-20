$(function(){
    $.fn.dataTable.ext.errMode = 'throw';
    $('body')

    // NAVIGATION MENU SCRIPTS
        .on('click','.menu_button', function(){
            if($(window).width() > 1200){
                $('.navigation').toggleClass('close_menu');
                $('.main_content').toggleClass('close_menu');
            } else {
                $('.navigation').toggleClass('open_menu');
                $('.menu_cover').toggleClass('open_menu');
                $('.main_content').toggleClass('open_menu');
            }
        })
        .on('click','.menu_cover', function(){
                $('.navigation').toggleClass('open_menu');
                $('.menu_cover').toggleClass('open_menu');
                $('.main_content').toggleClass('open_menu');
        })
    // GEO DEFAULTS
        .on('change', '#province', function(){
            fetch_geo('cities', $(this).val())
        })
        .on('change', '#cities', function(){
            fetch_geo('barangays', $(this).val())
        })

        
    // CUSTOMER ADD
        .on('change','#idAttachment', function (){
            previewImage(this, 'idAttachment');
        })
        .on('change','#store_photo', function(){
            previewImage(this, 'store_photo');
        })
        
    // ADD LEDGER
        .on('change','.item-select', function (){
            get_item($(this).val(), function(item){
                $('#ledger_price').val(item.price.price);
                $(`#ledger_unit option[value=${item.unit_id}]`).attr('selected','selected');
            });
        })

    // REPORT EVENTS
        .on('change', "select[name='province']", function(){
            fetch_geo_report('cities', $(this))
        })
        .on('change', "select[name='cities']", function(){
            fetch_geo_report('barangays', $(this))
        })
        .on('change','input[type="checkbox"]', function(){
            $(`.${$(this).attr('target')}_${$(this).attr('targetType')}_filter_container`).fadeToggle();
        })

    // PROFILE ADD
        
});