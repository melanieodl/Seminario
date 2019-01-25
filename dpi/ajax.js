
function fetch_select(val)
{
$.ajax({
type: 'post',
url: 'fetch_data.php',
data: {
get_option:val
},
success: function (response) {
document.getElementById("estado_civil").innerHTML=response; 
}
});
}

function fetch_select_lugar(val)
{
$.ajax({
type: 'post',
url: 'fetch_lugar.php',
data: {
get_option:val
},
success: function (response) {
document.getElementById("municipio_nacimiento").innerHTML=response; 
}
});
}

function fetch_select_vecindad(val)
{
$.ajax({
type: 'post',
url: 'fetch_lugar.php',
data: {
get_option:val
},
success: function (response) {
document.getElementById("municipio_vecindad").innerHTML=response; 
}
});
}
