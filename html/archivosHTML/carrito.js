function carrito() {
      // ✅ Aseguramos que el elemento existe antes de añadir el listener
      const boton = document.getElementById("btn-primary");
      boton.addEventListener("click", function() {
        console.log("✅ Entrada event Listener");

        // ✅ Capturamos los datos del producto
        let datos = {
          idProducto: 1, 
          nombre: document.getElementById("nombreProducto").innerText,
          categoria: "Accesorios",
          cantidad: document.getElementById("cantidad").value,
          precio: document.getElementById("precio").value
        };

        console.log("📦 Enviando al backend:", datos);

        // ✅ Enviamos con fetch
        fetch("http://localhost/proyecto/php/src/create_product.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(datos)
        })
        .then(response => response.text())
        .then(data => {
          console.log("Respuesta del backend:", data);
          alert("Producto añadido al carrito ✅");
        })
        .catch(error => console.error("Error:", error));
      });
    }
