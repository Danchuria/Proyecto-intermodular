function createUser()
{
    let name = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    let telephone = document.getElementById("telephone").value;
    let gmail = document.getElementById("gmail").value;
    let typeUser = document.getElementById("gmail").value;

    insertarUsuario(nombre,password,telephone,gmail);
}

function iniciarSesion()
{
    let name = document.getElementById("name").value;
    let password = docume.getElementById("password").value;

    getUsuario(nombre,password);
}

function deleteProduct()
{
    let idProduct = document.getElementById("idProduct").value;

    deleteProduct(idProduct);
}