(function (window, document, $) {
    var form = document.querySelector('#indexFilter');
    var input = document.querySelectorAll('tr[id=filters] input');
    input.forEach((item)=>{
        
        item.addEventListener('keypress',function(e){
            if(e.which==13){
                form.submit();
            }
            return ;
        })
        item.addEventListener('focusout',function(){
            form.submit();
        })
    })
})(window, document, jQuery)