logo.addEventListener("change", (e) => {
    document.querySelector('.logo_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.logo_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">
                                                        <i data-key="${file[0].lastModified}" id="logo_remove" class=" ri-delete-bin-2-line"></i>
                                                    </div>`;
    logoRemove()
})

function logoRemove(){
    if(document.getElementById('logo_remove') != null){
        document.getElementById('logo_remove').addEventListener('click', function(e){
            logo.value = ''
            e.target.parentNode.remove()
        })
    }
}

function itemDelete(){
    if(document.getElementById('logo_remove') != null){
        document.getElementById('logo_remove').addEventListener('click', function(e){
            logo.value = ''
            e.target.parentNode.remove()
        })
    }
}

items.addEventListener("change", (e) => {
    document.querySelector('.items_div').innerHTML=''

    let files = e.target.files;
    console.log(files)
    console.log(files.length)
    let content = ''
    for (var i = 0; i < files.length; i++){
        let url = URL.createObjectURL(files[i])
        let type_arr = files[i].type.split('/')
        console.log(url)
        if(type_arr[0] == 'video'){
            content += `<div class="d-flex file_div order-3">
                            <video class="img-thumbnail" controls><source src="${url}" type="${files[i].type}"></video>
                            <i data-key="${files[i].lastModified}" class="item_remove ri-delete-bin-2-line"></i>
                        </div>`

        }
        else{
            content += `<div class="d-flex file_div order-3">
                            <img src="${url}" class="img-thumbnail">
                            <i data-key="${files[i].lastModified}" class="item_remove ri-delete-bin-2-line"></i>
                        </div>`
        }

    }

    document.querySelector('.items_div').innerHTML = content;

    document.querySelectorAll('.item_remove').forEach( el => {
                    el.addEventListener('click', removeFile)

            })

})



function removeFile(e){

    let dt = new DataTransfer();
    let key = e.target.getAttribute('data-key')

    let delfile = document.querySelector('#items')
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
const removeElemnet = (a) => {
    if(document.querySelectorAll(".delete_link").length>1){
      
        a.parentElement.parentElement.remove()
    }
}

add_link.addEventListener('click', function(){
    let content = `<div><div class="col-lg-6 mr-3 d-flex mt-2 link_div">
                        <input type="url" class="form-control" name="links[]" >
                        <i class="icon ri-delete-bin-2-line remove_link"></i>
                    </div></div>`
    document.querySelector('.links_div').insertAdjacentHTML('beforeend',content)
    remove_links()
})

remove_links()

function remove_links(){
    document.querySelectorAll('.remove_link').forEach(el => {
        el.addEventListener('click', removeLink)
    })
}

function removeLink(){
    if(document.querySelector('.links_div').children.length > 1){
        this.parentNode.parentNode.remove()
    }
}


