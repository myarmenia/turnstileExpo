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
        logo_remove.addEventListener('click', function(e){
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
    // logoRemove()
    document.querySelectorAll('.item_remove').forEach( el => {
                    el.addEventListener('click', removeFile)

            })
    // removeFile()
})


// if(document.getElementById('delete_video') != null){
//     delete_video.addEventListener('click', function(){
//         let id = this.getAttribute('data-id')
//         console.log(id)
//         csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//          fetch('/admin/courses/lesson/video/delete/'+id,{
//                     method: 'get',
//                     headers: {'X-CSRF-TOKEN':csrf},
//                 }).then(async response => {
//                         if (!response.ok) {
//                         }
//                         else{
//                             const success = await response.json();
//                             if(success.message == 'deleted'){
//                                 delete_video.parentNode.remove()
//                             }
//                         }
//                     })
//     })
// }

// if (document.querySelectorAll('.files-input input').length > 0) {
//   document.querySelectorAll('.files-input input').forEach(fileInput => {
//     fileInput.addEventListener('change', (e) => {
//       // обходит файлы используя цикл
//       fileInput.parentNode.parentNode.querySelector('.file-list').innerHTML=''
//     //   let files = delfile.files;
//     let files = e.target.files;


//       for (var i = 0; i < files.length; i++) {
//         fileInput.parentNode.parentNode.querySelector('.file-list').innerHTML += `<div class="create-course__file-list"><span class="file-name">${files[i].name}</span><span data-key="${files[i].lastModified}" class="file-remove _icon-search-close"></span></div >`;
//       }
//       fileInput.parentNode.parentNode.querySelectorAll('.file-remove').forEach( el => {
//             el.addEventListener('click', removeFile)

//     })
//     });
//   });
// }

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
    console.log(55555)
    document.querySelectorAll('.remove_link').forEach(el => {
        el.addEventListener('click', removeLink)
    })
}

function removeLink(){
    if(document.querySelector('.links_div').children.length > 1){
        this.parentNode.parentNode.remove()
    }
}
