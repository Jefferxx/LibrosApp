async function cargarLibros(orden) {
    const res = await fetch(`../public/apiLibros.php?orden=${orden}`);
    const libros = await res.json();

    const container = document.getElementById("librosContainer");
    container.innerHTML = "";

    libros.forEach(libro => {
        const div = document.createElement("div");
        div.classList.add("card");
        div.innerHTML = `
            <h3>${libro.titulo}</h3>
            <p><strong>Género:</strong> ${libro.genero}</p>
            <p><strong>Precio:</strong> $${libro.precio}</p>
            <p><strong>Páginas:</strong> ${libro.paginas}</p>
            <p><strong>Año:</strong> ${libro.anio_publicacion}</p>
        `;
        container.appendChild(div);
    });
}

// Cargar por defecto ascendente
cargarLibros('asc');
