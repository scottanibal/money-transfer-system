// This function displays Smart Payment Buttons on your web page.
// paypal.Buttons().render('#paypal-button-container');
const MODE = "paypal";

var first_name = document.getElementById('tfirst_name');
var last_name = document.getElementById('tlast_name');
var phone_number = document.getElementById('tphone_number');
var email = document.getElementById('temail');
var address = document.getElementById('taddress');
var rec_first_name = document.getElementById('trec_first_name');
var rec_last_name = document.getElementById('trec_last_name');
var rec_phone_number = document.getElementById('trec_phone_number');
var rec_email = document.getElementById('trec_email');
var country_to = document.getElementById('tcountry_to');
var amount = document.getElementById('tamount');
var currency = document.getElementById('tcurrency');
var currency_name = document.getElementById('currencyname');
var fees = document.getElementById('fees');
var amount_to_receive = document.getElementById('treceive');
var rec_currency = document.getElementById('tcurrencyname');
var withdrawal = document.getElementById("withdrawal");
var _token = document.getElementsByName('_token')[0];
var btn = document.getElementById('test');

paypal.Buttons({
    createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: amount.value
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        var form = new FormData();
        form.append("first_name", first_name.value);
        form.append("last_name", last_name.value);
        form.append("phone_number", phone_number.value);
        form.append("email", email.value);
        form.append("address", address.value);
        form.append("rec_first_name",rec_first_name.value);
        form.append("rec_last_name", rec_last_name.value);
        form.append("rec_phone_number",rec_phone_number.value);
        form.append("rec_email", rec_email.value);
        form.append("country_to", country_to.value);
        form.append("amount", amount.value);
        form.append("currency", currency_name.value);
        form.append("rec_amount", amount_to_receive.value);
        form.append("rec_currency", rec_currency.value);
        form.append('withdrawal', withdrawal.value);
        form.append('mode', MODE)
        form.append("_token", _token.value);

        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            var xhr = new XMLHttpRequest();
            // online
            //const url = "http://worldlypayments.com/trans";
            // local
            const http = "http://localhost/";
            const url = http + "onlinemoneytransfersyst/omtsyst/public/trans";

            xhr.open("POST", url);
            // xhr.setRequestHeader('Access-Control-Allow-Origin', '*')
            // xhr.setRequestHeader("Content-Type", "application/json");
            var code = details["id"].substring(0, 9);
            form.append('code', code);
            xhr.send(form);

            xhr.addEventListener('readystatechange', function(){
                if(xhr.readyState === XMLHttpRequest.DONE){
                    // online
                    // window.location.href = "http://worldlypayments.com/confirm";
                    // local
                    window.location.href = http + 'onlinemoneytransfersyst/omtsyst/public/confirm';
                }
                else{
                    // alert(xhr.responseText);
                }
            });
        });
    }
}).render('#paypal-button-container');
