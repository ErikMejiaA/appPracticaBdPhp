export { postData };
//selecionamos el formulario
let formEstudiantes = document.querySelector('#formEstudiantes');
//el encabezado para el envio de datos
let myheadersEstu = new Headers({"Content-Type" : "application/json; charset:utf8"});

//le asignamos el evento al boton, para el envi de los datos
document.querySelector('#btnEstudiante').addEventListener('click', (e) => {

    e.preventDefault();
    //obtenemos el objeto de los datos del formulario
    let data = Object.fromEntries(new FormData(formEstudiantes).entries());
    console.log(data);
    postData(data)
        .then(res => {
            console.log(res);
        });
    alert("El dato fue enviado correctamente.")

})

//Funcion para el metodo POST (enviar los datos)
const postData = async (data) => {

    try {

        let config = {
            method : "POST",
            headers : myheadersEstu,
            body : JSON.stringify(data)
        }
        //definimos la respuesta
        let respuesta = await (await fetch("controllers/Estudiante/insert_data.php", config)).text();
        //console.log(respuesta);
        return respuesta;
        
    } catch (error) {
        console.log(error);
    }
}

//Funcion para el Metodo POST (traer un dato de la base de datos)

/*document.addEventListener('DOMContentLoaded', (el) => {

    postDataId(18); //menor
    getDataId(18); //mayor

})*/

const postDataId = async (id) => {

    try {

        let config = {
            method : "POST",
            headers : myheadersEstu,
            body : JSON.stringify(id)
        }
        let resp = await (await fetch("controllers/Estudiante/recibir_data.php", config)).text();
        console.log(resp);
        return resp;
        
    } catch (error) {
        console.log(error)
    }
}

//Funcion con el metodo GET (Traer un dato de la base de datos)
const getDataId = async (id) => {

    try {

        let config = {
            method : "GET",
            headers : myheadersEstu
        }
        //let respuesta1 = await (await fetch('controllers/Estudiante/recibirGet_data.php?id=' + id, config)).text();
        let respuesta1 = await (await fetch('controllers/Estudiante/recibirGet_data.php?edad=' + id, config)).text();
        console.log(respuesta1);
        return respuesta1;
        
    } catch (error) {
        console.log(error);
    }
}

