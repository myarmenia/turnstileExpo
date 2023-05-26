image_path.addEventListener("change", (e) => {

    document.querySelector('.image_path_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.image_path_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">

                                                    </div>`;
    document.getElementById('image_path_error').innerHTML=''

})
schema_path.addEventListener("change", (e) => {

    document.querySelector('.schema_path_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.schema_path_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">

                                                    </div>`;
                                                    
    let errorSchemaDiv=document.getElementById('schema_path_error')

    if(errorSchemaDiv!=null){

        document.getElementById('schema_path_error').innerHTML=''
    }

})
region_info_files.addEventListener("change", (e) => {

    document.querySelector('.region_info_files_div').innerHTML=''

    let files = e.target.files;
    console.log(files);
    for (var i = 0; i < files.length; i++){
        let url = URL.createObjectURL(files[i])

        console.log(url)
        document.querySelector('.region_info_files_div').innerHTML+= `<div class="d-flex file_div">
                                                                    <img src="${url}">
                                                                </div>`;
    }
    let errorDiv=document.getElementById('region_info_files_error')

    if(errorDiv!=null){

        document.getElementById('region_info_files_error').innerHTML=''
    }


})
