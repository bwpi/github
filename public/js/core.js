const path = window.location;
const get = path.search.split('&');
let param = {}
    /*
     *отправка ajax запроса
     */
function ajax(data) {
    $.ajax({
        type: "POST",
        url: path.protocol + '//' + path.hostname + ':' + path.port + path.pathname + get + '\n',
        data: { update: data },
        success: function(data) {
            messager('#message', data);
        },
        error: function() {
            alert('Не удача');
        }
    })
}

function alertMsg(el, ...args) {
    document.querySelector(el).innerHTML = 'В строке - ' + args[0] + ' столбец: ' + $('table thead tr th:eq(' + args[1] + ')').text() + ' изменены данные <b>' + args[2] + '</b> в файле - ' + args[3]
}

function messager(el, ...args) {
    document.querySelector(el).innerHTML = args
}


function checkText(old, act) {
    return (old != act) ? true : false
}
let oldText = ''
$('body').on('click', 'table td', function(e) {
    oldText = $(this).text().replace(/\s+/g, ' ').trim();
})


$('body').on('blur', 'table td', function(e) {
    param.text = e.target.innerText
    if (checkText(oldText, param.text)) {
        let cell = e.target;
        if (cell.tagName.toLowerCase() != 'td')
            return;
        param.col = cell.parentNode.rowIndex;
        param.row = $('table thead tr th:eq(' + cell.cellIndex + ')').text();
        param.target = document.querySelector('#id').innerText
            // alertMsg('#message', param.col, param.row, param.text, param.target)
        ajax(param);
    }

})