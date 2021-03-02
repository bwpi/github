 	// $('body').on('click', 'table td', function(e) {
 	//         let text = $(this).text().replace(/\s+/g, ' ').trim();
 	//         let cell = e.target;
 	//         if (cell.tagName.toLowerCase() != 'td')
 	//             return;
 	//         let i = cell.parentNode.rowIndex;
 	//         let j = cell.cellIndex;
 	//         console.log('Выделенный текст: ' + text + ' в строке - ' + i + ';\nв столбце: ' + $('table thead tr th:eq(' + j + ')').text());
 	//     })
 	// function getUrlVars(key) {
 	//     const vars = [];
 	//     // path = window.location.pathname.trim('/').split('/')
 	//     // console.log(path);
 	//     const parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
 	//         vars[key] = value;
 	//     });

 	//     return vars[key];
 	// }
 	let text = ''
 	let oldText = ''
 	const path = window.location;
 	const get = path.search.split('&');
 	/*
 	 *отправка ajax запроса
 	 */
 	function ajax(data) {
 	    $.ajax({
 	        type: "POST",
 	        url: path.protocol + '//' + path.hostname + ':' + path.port + path.pathname + get + '\n',
 	        data: { update: data },
 	        success: function(data) {
 	            console.log(data)
 	                // alertMsg('#message', data);
 	        },
 	        error: function() {
 	            alert('Не удача');
 	        }
 	    })
 	}

 	function alertMsg(el, ...args) {
 	    document.querySelector(el).innerHTML = 'В строке - ' + args[0] + ' столбец: ' + $('table thead tr th:eq(' + args[1] + ')').text() + ' изменены данные <b>' + args[2] + '</b> в файле - ' + args[3]
 	}


 	function checkText(old, act) {
 	    return (old != act) ? true : false
 	}
 	$('table, td').on('click', function(e) {
 	    let text = $(this).text().replace(/\s+/g, ' ').trim();
 	    let cell = e.target;
 	    if (cell.tagName.toLowerCase() != 'td')
 	        return;
 	    let i = cell.parentNode.rowIndex;
 	    let j = cell.cellIndex;
 	    oldText = e.target.innerText
 	    console.log('Выделенный текст: ' + oldText + ' в строке - ' + i + ';\nв столбце: ' + $('table thead tr th:eq(' + j + ')').text());

 	})

 	$('body').on('blur', 'table, td', function(e) {
 	    let param = {}
 	    text = e.target.innerText
 	    let target = document.querySelector('#id').innerText
 	    if (checkText(oldText, text)) {
 	        // let cell = e.target
 	        // if (cell.tagName.toLowerCase() != 'td')
 	        //     return
 	        // let target = document.querySelector('#id').innerText
 	        // let row = cell.parentNode.rowIndex
 	        // let col = cell.cellIndex
 	        let cell = e.target;
 	        if (cell.tagName.toLowerCase() != 'td')
 	            return;
 	        let i = cell.parentNode.rowIndex;
 	        let j = cell.cellIndex;
 	        param.col = i
 	        param.row = j
 	        param.text = text
 	        param.target = target
 	        console.log(param)
 	            // alertMsg('#message', col, row, text, target)
 	        ajax(param);
 	    }
 	})


 	// $('table, td').on('blur', function(event) {
 	//     
 	//     let target = document.querySelector('#id').innerText
 	//     const cell = event.target
 	//     text = cell.innerText
 	//     console.log('Старый текст' + oldText);
 	//     if (!oldText) return
 	//     if (cell.tagName.toLowerCase() != 'td')
 	//         return
 	//     const row = cell.parentNode.rowIndex
 	//     const col = cell.cellIndex
 	//     param['col'] = col
 	//     param['row'] = row
 	//     param['text'] = oldText
 	//     param['target'] = target
 	//     alertMsg('#message', col, row, oldText, target)
 	// })