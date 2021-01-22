//Código do worker.

// Evento que monita mensagens vindas da página para o worker
onmessage = function (e) {

    //e.data contém o valor enviado pela página.
    if (e.data === "executar") {

        execucaoDemorada();

        postMessage("fim");
    }
};

function execucaoDemorada() {
    
    var tempoDeEspera = 10000; //10 segundos
    var inicio = (new Date()).getTime();
    var i = 0;
    while(((new Date()).getTime() - inicio) <= tempoDeEspera){
        postMessage({ "acao": "mostrar", "incremento": i }); //envia uma nova mensagem para a página
        i++;
    }
            

    postMessage({ "acao": "parar" });  //envia uma nova mensagem para a página

}