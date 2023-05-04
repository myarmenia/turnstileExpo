banner.addEventListener("change", (e) => {
    document.querySelector('.banner_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.banner_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">
                                                        <i data-key="${file[0].lastModified}" id="banner_remove" class=" ri-delete-bin-2-line"></i>
                                                    </div>`;
    logoRemove()
})

function logoRemove(){
    if(document.getElementById('banner_remove') != null){
        banner_remove.addEventListener('click', function(e){
            banner.value = ''
            e.target.parentNode.remove()
        })
    }
}

items.addEventListener("change", (e) => {
    document.querySelector('.items_div').innerHTML=''

    let files = e.target.files;
    console.log(files.length)
    let content = ''
    for (var i = 0; i < files.length; i++){
        let url = URL.createObjectURL(files[i])
        content += `<div class="d-flex file_div">
                        <img src="${url}" class="">
                        <i data-key="${files[i].lastModified}" class="item_remove ri-delete-bin-2-line"></i>
                    </div>`
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
const removeElemnet = (a) => {
    if(document.querySelectorAll(".delete_link").length>1)a.parentElement.remove()
}
add_link.addEventListener('click', function(){
    let content = `<div class="links_div col-lg-6 mr-3 d-flex">
                        <input type="url" class="mt-2 form-control" name="links[]" >
                        <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
                    </div>`
    document.querySelector('.links_div').insertAdjacentHTML('beforeend',content)
})

