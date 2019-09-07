
let sock = new WebSocket( 'ws://192.168.1.53:15373/bin/game-server.php' );
let div_responses = document.getElementById('responses');
let input = document.getElementById('query_input');

sock.onopen = function(e) {
    div_responses.innerHTML += '<span class="success">Connexion établie !</span><br>';
    input.disabled = false;
};

sock.onerror = function(e) {
    console.log(e);
    div_responses.innerHTML += '<span class="error">Une erreur est survenue...</span><br>';
    input.disabled = true;
};

sock.onmessage = function(e) {
    console.log(e);
    div_responses.innerHTML += e.data + '<br>';
};

sock.onclose = function(e) {
    console.log(e);
    div_responses.innerHTML += '<span class="info">La connexion a été interrompue...</span><br>';
    input.disabled = true;
};

document.getElementById('query_input').addEventListener('keydown', function(e) {
    if (e.key == 'Enter') {
        let query = input.value;
        sock.send(query);
        input.value = '';
        console.log('Envoi de : ' + query);
    }
});