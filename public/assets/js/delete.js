document.addEventListener('DOMContentLoaded', function () {
    let elements = document.querySelectorAll('.delete');
    elements.forEach(function(e,i) {
        e.addEventListener('click', function() {
            const id = this.getAttribute('rel');
            const path = this.getAttribute('path');
            if(confirm('Are you sure?')) {
                sendData(`/${path}/${id}`).then(() => {
                    location.reload()
                })
            } else {
                alert("Delete cancelled")
            }
        })
    })
});

async function sendData(url) {
    let response = await fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });
    let result = await response.json();
    return result.ok;
}
