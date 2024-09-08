<h2>CONTACT</h2>
<form actio="" method="post" id ="form">
<input type="text" name="name" valeu="" />
<input type="text" name="email" valeu="" />
<a herf="javacript:void(0)" id ="submit" style="cursor:pointer;background-color:#f0f0f0;width:200px;height:25px;display:block;">Enviar</a>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>(function(){
const submit = document.querySelector('#submit');
submit.addEventListener('click', function(event){

event.preventDefault();

const form = document.querySelector('form#form');
const datas = new FormData(form);
const fields = Object.fromEntries(datas.entries());
/* console.log('fields:: ' + JSON.stringify(fields,null,1)); */

let domaiName = window.location.hostname;
let domain = (domaiName == 'localhost') ? 'http://127.0.0.1/desafio-desenvolvedor' : 'https://' + domaiName;
const apiUrl = domain + '/contact';

let xmlreq = jQuery.post( apiUrl, { "form": fields });
xmlreq.setRequestHeader("Accept", "application/json");
xmlreq.setRequestHeader("Content-Type", "application/json");

xmlreq.done( function( data )
{
    console.log('done:: ' + JSON.stringify(data, null, 1));
});

xmlreq.fail( function( data )
{
    console.log('fail:: ' + JSON.stringify(data, null, 1));
});

});
})(jQuery)</script>