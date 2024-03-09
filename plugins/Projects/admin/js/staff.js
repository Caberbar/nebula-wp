jQuery(document).ready(function($){
   
    //Funcion para activar o desactivar el botton dependiendo del numero de filas
    function updateRemoveButton(){
        //conseguir numero de filas
        let rowCount=$('#custom-array-tbody tr').length;
        $('#remove-row').prop('disabled',rowCount===1);
    }
   
   
   
   
    //añadir nueva fila
   
    $('#add-row').on('click',function(){
        console.log('add');
        let lastRow=$('#custom-array-tbody tr:last'); //Cogemos la ultima fila de la tabla.
        let hasValue=lastRow.find('input[type=text]').filter(
                function(){
               
                    return $(this).val().trim() !== '';
                       
            }).length > 0;
           
            //añadir una nueva fila solamente si la ultima no esta vacia
            if(hasValue){ //el ultimo tr no esta vacio
                let rowCount=$('#custom-array-tbody tr').length;  //Coger el numero de filas
                let newRow='<tr><td><input type="text" class="td-name" value="" name="mpm_custom_array_field['+rowCount+'][key1]"></td><td><input type="text" class="td-name" value="" name="mpm_custom_array_field['+rowCount+'][key2]"></td><td><button type="button" id="remove-row"  class="button button-primary td-delete"><span class="dashicons dashicons-dismiss"></span>&nbsp;REMOVE</button></td></tr>';                                    
                //Crear una nueva fila
               
                //Append la nueva fila a la estructura
                $('#custom-array-tbody').append(newRow);    
                updateRemoveButton();
            }
    });
   
   
    //
    $('.custom-array-metabox').on('click','#remove-row',function(){
        console.log('remove');
        $(this).closest('tr').remove();
        updateRemoveButton();
    });
     
    //Eliminar fila
   
    //Inicialización
    updateRemoveButton();
});
