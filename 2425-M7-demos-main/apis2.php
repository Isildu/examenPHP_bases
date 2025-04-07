<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Veure productes</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png"/>
</head>
<body>
    <h1>Veure producte en detall</h1>
    <ul id="productes"></ul> <!-- Afegeix un <ul> per mostrar el producte -->

    <script>
        function obtenirProId() {
            const params = new URLSearchParams(window.location.search);
            return params.get("pro_id");
        }
        async function carregarProducte() {
            const proId = obtenirProId();

            try {
                //const url = 'https://fakestoreapi.com/products/' + proId;
                const resposta = await fetch(`https://fakestoreapi.com/products/${proId}`);
                if (!resposta.ok) throw new Error("Error en carregar el producte");

                const producte = await resposta.json(); // És un objecte, no un array
                console.log(producte);

                const llista = document.getElementById("productes");
                const element = document.createElement("li");
                element.innerHTML = `
                    <strong>${producte.title}</strong><br>
                    <img src="${producte.image}" alt="${producte.title}" width="250"><br>
                    Preu: ${producte.price}€<br>
                    Categoria: ${producte.category}<br>
                    <em>${producte.description}</em>
                `;
                llista.appendChild(element);

            } catch (error) {
                console.error("Error:", error);
            }
        }

        carregarProducte();
    </script>
</body>
</html>