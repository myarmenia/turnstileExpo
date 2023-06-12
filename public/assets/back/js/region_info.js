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

    // document.querySelector('.region_info_files_div').innerHTML=''

    let files = e.target.files;
    console.log(files);
    for (var i = 0; i < files.length; i++){
        let url = URL.createObjectURL(files[i])

        console.log(url)
        document.querySelector('.region_info_files_div').innerHTML+= `<div class="d-flex file_div">
                                                                    <img src="${url}">
                                                                    <i data-key="${files[i].lastModified}" id="logo_remove" class="item_remove  ri-delete-bin-2-line"></i>
                                                                </div>`;
    }

    document.querySelectorAll('.item_remove').forEach( el => {
        el.addEventListener('click', removeFile)

    })
    let errorDiv=document.getElementById('region_info_files_error')

    if(errorDiv!=null){

        document.getElementById('region_info_files_error').innerHTML=''
    }


})


function removeFile(e){

    let dt = new DataTransfer();

    let key = e.target.getAttribute('data-key')

    let delfile = document.querySelector('#region_info_files')
    console.log(delfile)
    for (let file of delfile.files) {

		dt.items.add(file);
	}

	delfile.files = dt.files;

    for(let i = 0; i < dt.files.length; i++){
			if(key == dt.files[i].lastModified){
				dt.items.remove(i);
				continue;
			}
	}
    delfile.files = dt.files
        console.log(delfile.files)

    e.target.parentNode.remove()
}
