
function loadPosts() {
    fetch('./php/select.php')
        .then(response => response.text()) 
        .then(text => {
            console.log(text); 
            return JSON.parse(text); 
        })
        .then(data => {
            const postsArea = document.getElementById('postsArea');
            postsArea.innerHTML = ''; 
            data.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.className = 'border p-3 mb-3';
                postDiv.innerHTML = `
                    <p>${post.texto}</p>
                    <button class="btn btn-sm ${post.curtido ? 'btn-info' : 'btn-outline-info'}" onclick="toggleLike(this, ${post.id})">${post.curtido ? 'Curtido' : 'Curtir'}</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="removePost(this, ${post.id})">Excluir</button>
                `;
                postsArea.prepend(postDiv);
            });
        })
        .catch(error => console.error('Erro ao carregar postagens:', error));
}

document.getElementById('postForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const postContent = document.getElementById('postContent').value.trim();

    if (postContent) {
        fetch('./php/insert.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `texto=${encodeURIComponent(postContent)}`,
        })
        .then(response => response.text())
        .then(() => {
            document.getElementById('postForm').reset();
            loadPosts(); 
        })
        .catch(error => console.error('Erro ao inserir postagem:', error));
    }
});

function toggleLike(button, postId) {
    const liked = button.textContent === 'Curtir';
    
  
    button.textContent = liked ? 'Curtido' : 'Curtir';

    fetch('./php/update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${postId}&curtida=${liked ? 1 : 0}`,
    })
    .then(response => response.text())
    .then(() => {
        loadPosts();
    })
    .catch(error => console.error('Erro ao atualizar curtida:', error));
}

function removePost(button, postId) {
    fetch('./php/delete.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${postId}`,
    })
    .then(response => response.text())
    .then(() => {
        loadPosts(); 
    })
    .catch(error => console.error('Erro ao remover postagem:', error));
}

a
document.addEventListener('DOMContentLoaded', loadPosts);