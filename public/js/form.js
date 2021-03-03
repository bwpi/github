let change = []
let out = ''
$(function(){
    
    $('.button-btn').click(function(e){
        e.preventDefault()
        let attr = $(this).attr('href').replace('?id=', '');
        
        if(!change[attr]){
            // change[attr] = `"${attr}"`
            change[attr] = attr
        } else {
            delete change[attr]
        }
        out = change.filter(Boolean);
        out.join(';');
    });
    $('.submit').click(function(e){
        if (!out) {
            e.preventDefault()            
        } else {
            const gen = $(this).attr('href')
            // $(this).attr('href', gen + '&class=' + `{${out}}`);      
            $(this).attr('href', gen + '&class=' + out);        
        }
        console.log($(this).attr('href'));
    })
})