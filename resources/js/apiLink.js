function copyApiLink(id) {
    var clipboard = new ClipboardJS('.copy-api', {
        text: function(trigger) {
            var fileId = trigger.getAttribute('value');
            return location.protocol + '//' + location.host + "/api/content/" + fileId;
        }
    });

    clipboard.on('success', function(e) {
        var message = document.createElement('div');
        message.textContent = "Texto copiado: " + e.text;
        message.classList.add('mensaje-copiado');

        // Posiciona el mensaje encima del botón
        var buttonPosition = e.trigger.getBoundingClientRect();
        message.style.position = 'absolute';
        message.style.top = buttonPosition.top - 2 + 'px'; // Ajusta la posición vertical
        message.style.left = buttonPosition.right + 10 + 'px'; // Ajusta la posición horizontal

        document.body.appendChild(message);

        setTimeout(function() {
            message.remove();
        }, 1500);
    });

    clipboard.on('error', function(e) {
        console.error('Error al copiar el texto al portapapeles: ', e.action);
    });
}

$(function() {
    $(".copy-api").click(function() {
        copyApiLink($(this).data('id'));
    });
});
