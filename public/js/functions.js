
function previewImage(input, img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(`.${img}`).attr('src', e.target.result);
            $(`.${img}`).addClass('show_preview');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function fetch_geo(target, code) {
    let $geo = $(`#${target}`);
    $geo.empty();
    $geo.append(`<option value="0">...fetching data</option>`);
    $.ajax({
        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/geo/${target}`,
        data: { 'code': code },
        success: function(response){
            let options = '';
            options = `<option value="">- Select ${target} -</option>`
            $geo.empty();
            response.map(function(item, index) {
                options += `<option value="${item.code}">${item.description}</option>`;
            });

            $geo.append(options);
        },
        failed: function(){
            failed();
        }
    })
}

function get_item(item_id, callback){
    $.ajax({
        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/item/${item_id}`,
        success: function(response){
            callback(response);
        }
    })
}

