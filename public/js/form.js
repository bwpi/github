let change = new Map()
let out = []
let gen = $('.submit').attr('href')
let className = ''
$(function() {

    $('.btn-change').click(function(e) {
        e.preventDefault()
        $(this).toggleClass('activate')
        let attr = $(this).attr('href').replace('?id=', '')
        if (!out[attr]) {
            out[attr] = attr
        } else {
            delete out[attr]
        }
        let html = ''
        out.forEach((value, key) => {
            html += `
                <div id="${key}" class="d-inline">${value}</div>
                `
        })
        $('.info').html(html)
        let out1 = out.filter(element => element !== null)
        className = out1.join(';')
        console.log(gen + `&class=${className}`);
        $('.submit').attr('href', gen + `&class=${className}`);
    })

})