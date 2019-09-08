
// let sock = new WebSocket( 'ws://192.168.1.53:15373/bin/game-server.php' );
// let div_responses = document.getElementById('responses');
// let input_query = document.getElementById('query_input');
// let input_host = document.getElementById('host');
// let btn_start_server = document.getElementById('btn_start_server');

// btn_start_server.addEventListener('click', function() {
//     let host = input_host.value.length ? input_host.value : 'the5000.com';
//     let sock = new WebSocket( 'ws://'+host+':15373/bin/game-server.php' );
//     input_host.disabled = true;
//     btn_start_server.disabled = true;

//     sock.onopen = function(e) {
//         div_responses.innerHTML += '<span class="success">Connexion établie !</span><br>';
//         input_query.disabled = false;
//     };

//     sock.onerror = function(e) {
//         console.log(e);
//         div_responses.innerHTML += '<span class="error">Une erreur est survenue...</span><br>';
//         input_query.disabled = true;
//     };

//     sock.onmessage = function(e) {
//         console.log(e);
//         div_responses.innerHTML += e.data + '<br>';
//     };

//     sock.onclose = function(e) {
//         console.log(e);
//         div_responses.innerHTML += '<span class="info">La connexion a été interrompue...</span><br>';
//         input_query.disabled = true;
//     };

//     document.getElementById('query_input').addEventListener('keydown', function(e) {
//         if (e.key == 'Enter') {
//             let query = input_query.value;
//             sock.send(query);
//             input_query.value = '';
//             console.log('Envoi de : ' + query);
//         }
//     });
// });
