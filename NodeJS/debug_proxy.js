var net = require('net'),
    util = require('util'),
    portToCapture = 5859,
    portToPassThrough = 5858;

net.createServer(function (capturingSocket) {

    var passThroughSocket = net.connect({ port: portToPassThrough }, function () {
        capturingSocket.pipe(passThroughSocket);
        passThroughSocket.pipe(capturingSocket);

        console.log('Connection to pass through socket established.');
    });

}).listen(portToCapture);

console.log(util.format('Created proxy listening on %s and redirecting to %s.', portToCapture, portToPassThrough));