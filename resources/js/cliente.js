function updateTable(system) {
    const tableBody = document.getElementById('client-table-body');
    tableBody.innerHTML = "";

    let fileName;

    // Cambiar el peso por el real del fichero y el enlace de descarga
    if (system === 'Linux') {
        fileName = 'OMV-Client_EXPORT_LINUX.zip';
    } else if (system === 'Windows') {
        fileName = 'OMV-Client_EXPORT_WIN64.zip';
    }
    
    if (system === 'Linux' || system === 'Windows') {
        document.getElementById('client-table').getElementsByTagName('thead')[0].style.display = 'table-header-group';
    }

    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${system} OMV</td>
        <td>Obtener MB</td>
        <td><a href="#" onclick="downloadFile('${fileName}')">OMV-Client-${system} </a></td>`;
    tableBody.appendChild(row);
}

function downloadFile(fileName) {
    const link = `{{ route('descargar.fichero', ['fileName' => '']) }}/${fileName}`;
    
    fetch(link)
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(new Blob([blob]));
            const a = document.createElement('a');
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        })
        .catch(error => console.error('Error downloading file:', error));
}

document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('client-table').getElementsByTagName('thead')[0].style.display = 'none';
    const downloadLinks = document.querySelectorAll('#download-list a');

    downloadLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            updateTable(this.textContent.trim());
        });
    });
});