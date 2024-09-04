
$(function(){
    let edit = false;
    console.log("jQuery is working");
    $('#tasks-result').hide();

    getTasks();

    $('#search').keyup(function(){

        let search = $('#search').val();
        // console.log(search);
        if ($('#search').val()) {
            $('#tasks-result').show();
            $.ajax({   
                url: 'task-search.php',
                type:'POST',
                data:{search:search},
                success:function(response){
     
                    let tasks = JSON.parse(response);
                    let templade = '';
    
                    console.log(tasks);
                    tasks.forEach(task => {
                        templade += `<li>${task.name}</li>`;
                    })
    
                    $('#container').html(templade); 
    
                }     
            })//ajax            
        }

    });

    $('#task-form').submit(function(e){// caturar el evento
        
        const postData ={
            name:$('#name').val().trim(),
            description:$('#description').val().trim(),
            id:$('#taskId').val().trim()
        };

        if (postData.name === '' || postData.description === '') {
            alert('No se admiten campos vacios');
            return;
        }
        // console.log("post data",[postData]);

        let url = edit === false ? './operaciones/task-add.php' : './operaciones/task-edit.php';
        
     $.post(url, postData, function(response){
            console.log(response); 
            getTasks();
            $('#task-form').trigger('reset');
            
        });
        e.preventDefault();// evitar que se recargue la pag


    });// task-form


    // metodo ajax
    function getTasks(){
         $.ajax({

        url: './operaciones/task-list.php',
        type:'GET',
        success:function(response){
            
            let tasks = JSON.parse(response);
            let templade = '';

            tasks.forEach(task => {
                templade += `
                <tr>
                <td id="${task.id}">${task.id}</td>
                <td>${task.name}</td>
                <td>${task.description}</td>
                <td> 
                    <button class="btn btn-primary btn-sm task-edit" data-id="${task.id}">Edit</button>
                    <button class="btn btn-danger btn-sm task-delete" data-id="${task.id}">Delete</button>
                </td>
                </tr>
                `;
            });

            $('#tasks').html(templade);
           
        }
    });

    }// getTasks


    // $(document).on('click', '.task-delete', function(){
       

    //     if(confirm("Desea eliminar la tarea?")){  
    //         console.log("delete");
    //         const id = $(this).data('id');
    //         // console.log(id);

    //         $.post("./operaciones/task-delete.php", {id:id}, function(response){
    //             console.log(response);
    //             getTasks();
    //         });
    //     }// if
    
    
    // });//on click


    let taskIdToDelete = null;

    $(document).on('click', '.task-delete', function() {
        taskIdToDelete = $(this).data('id');
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').click(function() {
        if (taskIdToDelete) {
            $.post("./operaciones/task-delete.php", {id: taskIdToDelete}, function(response) {
                console.log(response);
                getTasks();
                $('#deleteModal').modal('hide');
            });
        }
    });


// const element = $(this)[0].parentElement.parentElement;
// const id = $(element).attr('id');
// console.log(id);


    //    const element = $(this)[0].activeElement.parentElement.parentElement;
    //    const id = $(element).attr('taskId');

   $(document).on('click', '.task-edit', function(){

       const id = $(this).data('id');
       

        $.post("./operaciones/task-single.php", {id: id}, function(response) {

           console.log(response);
           const task = JSON.parse(response);
           $('#name').val(task.name);
           $('#description').val(task.description);
           $('#taskId').val(task.id);
           edit = true;
            
        })

       // Realiza una solicitud AJAX para obtener los detalles de la tarea seleccionada

       
   })


//////////////////////

//// modal edit

// $(document).on('click', '.task-edit', function() {
//     const id = $(this).data('id');

//     // Realiza una solicitud AJAX para obtener los detalles de la tarea seleccionada
//     $.post("./operaciones/task-get.php", {id: id}, function(response) {
//         const task = JSON.parse(response);
//         $('#edit-task-id').val(task.id);
//         $('#edit-name').val(task.name);
//         $('#edit-description').val(task.description);
//         $('#editModal').modal('show');
//     });
// });

// // Guardar los cambios realizados en la tarea
// $('#saveEdit').click(function() {
//     const id = $('#edit-task-id').val();
//     const name = $('#edit-name').val();
//     const description = $('#edit-description').val();

//     $.post("./operaciones/task-edit.php", {
//         id: id,
//         name: name,
//         description: description
//     }, function(response) {
//         console.log(response);
//         $('#editModal').modal('hide');
//         getTasks(); // Actualiza la lista de tareas después de guardar
//     });
// });


});// anonymous function



