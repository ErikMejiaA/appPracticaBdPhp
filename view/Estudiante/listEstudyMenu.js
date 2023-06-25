//++++++++++++++++++++++++mostramos la informacion de elimianr en el modal++++++++++++++++++++++++

let tabla = document.querySelector('#myTablaEstudiante');
let tbody= tabla.querySelector('tbody');
let row  = tbody.querySelectorAll('tr');
let idEstudiante = 0;
let op = 0;

//evento para abrir el modal de eliminar
document.querySelectorAll(".eliminarEstudiante").forEach((val, opc) => {
    val.addEventListener('click', (e) => {
        idEstudiante = e.target.id;
        op = opc;
        getDataIdEstu(idEstudiante)
            .then(resp => {
                llenarModal(JSON.parse(resp));
            });

        e.preventDefault();
    })
});

//creamos el METODO GET para traer un dato
const getDataIdEstu = async (id_estudiante) => {

    try {
        let myheadersEstu = new Headers({"Content-Type" : "application/json; charset:utf8"})
        let config = {
            method : "GET",
            headers : myheadersEstu
        }
        //enviamos y resivimos la espuesta
        let respuesta = await (await fetch('../../../controllers/Estudiante/recibirGet_data.php?idEstu=' + id_estudiante, config)).text();
        //console.log(respuesta);
        return respuesta;
        
    } catch (error) {
        console.log(error)
    }   
}

//llenamos el modal con los datos 
function llenarModal(data) {
    data.forEach(itemData => {
        document.querySelector('#infoEstu').innerHTML = "Desea Elimiar a: <b> " + itemData.nombre + " </b> Con Id:<b> " + itemData.id_estudiante + " </b>";
    });

    elimarDatoEstu();
}

//Funcion para elimianr un dato
const elimarDatoEstu = () => {
    document.querySelector(".borrarEstudiante").addEventListener('click', (e) => {
        deleteDataEstu(idEstudiante)
            .then(resp => {
                row[op].remove();
            });
    });
}

//Metodo DELETE para borara el datos de la base de datos 
const deleteDataEstu = async (id_estu) => {

    try {
        let myheadersEstu = new Headers({"Content-Type" : "application/json; charset:utf8"});
        let config = {
            method : "DELETE",
            headers : myheadersEstu
        }
        //enviamos el datos y resibimos la respuesta
        let respuesta = await (await fetch('../../../controllers/Estudiante/delete_data.php?id=' + id_estu, config)).text();
        return respuesta;
        
    } catch (error) {
        console.log(error);
    }
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//+++++++++++++++++++++++++ parte para editarla la informacion del estudiantes++++++++++++++++++++++++++++++++++++

//evento para abrir el modal de editar
document.querySelectorAll(".editarEstudiante").forEach((val, opc) => {
    val.addEventListener('click', (e) => {
        let idEstudy = e.target.id;
        getDataIdEstu(idEstudy)
            .then(res => {
                cargarInfEstudiante(JSON.parse(res));
            });
        e.preventDefault();
    })
});

//funcion para llenar el modal con la info del estudiante
const cargarInfEstudiante = (data) => {
    data.forEach(datoEstudy => {
        //obtenemos el formulario
        let formEstu = document.querySelector('#frmUpdateDataEstu');
        // creamos una instanciamos del formulario
        const dataForm = new FormData(formEstu);
        //creamos la promesa con los datos
        const {id_estudiante, nombre, direccion, edad, logros, detalle} = datoEstudy;
        dataForm.set("id_estudiante", id_estudiante);
        dataForm.set("nombre", nombre);
        dataForm.set("direccion", direccion);
        dataForm.set("edad", edad);
        dataForm.set("logros", logros);
        dataForm.set("detalle", detalle);

        document.querySelector(".estu").innerHTML = id_estudiante;
        // Itera a través de los pares clave-valor de los datos
        for (let pair of dataForm.entries()) {
            // Establece los valores correspondientes en el formulario
            formEstu.elements[pair[0]].value = pair[1];
        }
    });
    guardarDataEstu();
}

//creamos el evento al boton de guardar los datos editados
const guardarDataEstu = () => {
    document.querySelector(".guardarEtudiante").addEventListener('click', (e) => {
        //leemos el formulario
        let formEstu = document.querySelector('#frmUpdateDataEstu');
        //creamos el objeto con los datos del formulario
        let data = Object.fromEntries(new FormData(formEstu).entries());
        //enviamoslos datos
        postData(data)
            .then(resp => {
                //console.log(resp);
            });

        e.preventDefault();
        location.reload();
    });
}

//Metodo POST para enviar los datos editados
const postData = async (data) => {

    try {
        let myheadersEstu = new Headers({"Content-Type" : "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myheadersEstu,
            body : JSON.stringify(data)
        }
        //definimos la respuesta
        let respuesta = await (await fetch("../../../controllers/Estudiante/update_data.php", config)).text();
        //console.log(respuesta);
        return respuesta;
        
    } catch (error) {
        console.log(error);
    }
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//+++++++++++++++++++++++++++++++ visualizar formato de la tabla +++++++++++++++++++++++++++++++++++++++++++++++

$('#myTablaEstudiante').DataTable({
    pageLength: 4,
    language: {

        "decimal": "",
        "emptyTable": "No hay datos en la tabla",
        "info": "Desde _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
        "infoFiltered": "(filtered from _MAX_ total entries)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrando _MENU_ registros",
        "loadingRecords": "Loading...",
        "processing": "",
        "search": "Buscar:",
        "zeroRecords": "Nose encontraron registros",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }

    },
})

//-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 
