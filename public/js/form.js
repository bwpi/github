let out = []
let quart = []
let classes = ''
let quartes = ''
const gen = $('.submit').attr('href')
$(function() {

    $('.btn-change').click(function(e) {
        e.preventDefault()
        $(this).toggleClass('activate')
        let attr = $(this).attr('data-class');
        !out[attr] ? out[attr] = attr : delete out[attr]
        let html = ''
        $('.class').remove()
        out.forEach((value, key) => {
            html += `
                <div id="${key}" class="class d-inline">${value}</div>
                `
        })
        $('.info').prepend(html)
        classes = out.filter(Boolean).join(';')
    })

    $('.btn-change-quad').click(function(e) {
        e.preventDefault()
        $(this).toggleClass('activate')
        let quarter = $(this).attr('data-quarter');
        !quart[quarter] ? quart[quarter] = quarter : delete quart[quarter]
        let html = ''
        $('.quarter').remove()
        quart.forEach((value, key) => {
            html += `
                <div class="quarter bg-success d-inline">${value}</div>
                `
        })
        $('.info').append(html)
        quartes = quart.filter(Boolean).join(';')
    })

    $('.submit').click(function(e) {
        if (!(classes || quartes)) {
            e.preventDefault()
            alert('Выбери хотя бы класс! Иначе вопросов будет очень много!')
        } else {
            cls = classes ? `&class=${classes}` : ''
            qart = quartes ? `&quart=${quartes}` : ''
            $(this).attr('href', gen + cls + qart);
        }
    })

})