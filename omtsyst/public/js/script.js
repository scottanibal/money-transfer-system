const visapay = document.getElementById("visapay")
const visaform = document.getElementById('visaform')

visapay.addEventListener('click', function(){
   if(visaform.style.display == ''){
       visaform.style.display = 'block'
   }
   else{
       visaform.style.display = 'none';
   }
})
function showDetailOffice(elt)
{
    var parent = elt.parentNode
    var i = elt.querySelector("i")
    var div = parent.querySelector("div")
    if(div.style.display == 'block'){
        div.style.display = 'none';
        i.className = "fas fa-angle-right"
    }
    else{
        div.style.display = 'block';
        i.className = "fas fa-angle-down"
    }
}
function calculate_fees(){
    var form_fees = document.getElementById('form-calculate-fees');
    var access_token = document.getElementsByName('_token')[0].value;
    var total_amount = 0;
    var from_currency = "";
    var from_currency_symbol = "";
    var to_currency = "";
    var to_currency_symbol = "";
    var error = 4;

    if(parseInt(document.getElementById('exchange_amount').value) > 0)
    {
        total_amount = document.getElementById('exchange_amount').value;
        error--;
    }
    if(document.getElementById('from_currency').value.length > 0)
    {
        var currency = document.getElementById('from_currency').value.split('--')
        from_currency = currency[0];
        from_currency_symbol = currency[1]
        error--;
    }
    if(document.getElementById('to_currency').value.length > 0)
    {
        var currency = document.getElementById('to_currency').value.split('--');
        to_currency = currency[0];
        to_currency_symbol = currency[1];
        error--;
    }
    if(access_token.length > 5)
    {
        error--;
    }
    if(error === 0)
    {
        var form = new FormData();
        form.append('total_amount', total_amount);
        form.append('from_currency', from_currency);
        form.append('to_currency', to_currency);
        form.append('_token', access_token);

        var xhr = new XMLHttpRequest();
        const http = "http://localhost/";
        const url = http + "onlinemoneytransfersyst/omtsyst/public/calculate";

        xhr.open("POST", url);
        xhr.send(form);

        xhr.addEventListener('readystatechange', function(){
            if(xhr.readyState === XMLHttpRequest.DONE) {
                var response = xhr.responseText.split('-')
                var result_div = document.getElementById('result-b')
                var result_text = result_div.getElementsByClassName('result-ex');

                result_text[0].querySelector('span').innerText = " " + response[0] + " " + from_currency_symbol;
                result_text[1].querySelector('span').innerText = " " + response[1] + " " + from_currency_symbol;
                result_text[2].querySelector('span').innerText = " " + response[3] + " " + to_currency_symbol;
            }
        });
    }
}
