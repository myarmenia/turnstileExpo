image.addEventListener("change", (e) => {
    document.querySelector('.show_image').innerHTML=''

    let files = e.target.files;
    let content = ''
    let url = URL.createObjectURL(files[0])
    let type_arr = files[0].type.split('/')
    content += `<div class="d-flex file_div order-3">
                    <img src="${url}" class="img-thumbnail">
                </div>`


    document.querySelector('.show_image').innerHTML = content;
    // logoRemove()
    document.querySelectorAll('.item_remove').forEach( el => {
        el.addEventListener('click', removeFile)
    })
    // removeFile()
})

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