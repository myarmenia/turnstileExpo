map_image.addEventListener("change", (e) => {
    document.querySelector('.map_image_view').innerHTML=''

    let files = e.target.files;
    console.log(files)
    console.log(files.length)
    let content = ''
    let url = URL.createObjectURL(files[0])
    let type_arr = files[0].type.split('/')
    console.log(url)
    content += `<div class="d-flex file_div order-3">
                    <img src="${url}" class="img-thumbnail">
                </div>`


    document.querySelector('.map_image_view').innerHTML = content;
    // logoRemove()
    document.querySelectorAll('.item_remove').forEach( el => {
                    el.addEventListener('click', removeFile)

            })
    // removeFile()
})


function removeFile(e){

    let dt = new DataTransfer();
    let key = e.target.getAttribute('data-key')

    let delfile = document.querySelector('#map_image')
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

// add_link.addEventListener('click', function(){
//     let content = `<div>
//                     <div class="links_div col-lg-6 mr-3 d-flex">
//                         <input type="url" class="mt-2 form-control" name="links[]" >
//                         <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
//                     </div>
//                 </div>`
//     document.querySelector('.links_div').insertAdjacentHTML('beforeend',content)
// })

add_link.addEventListener('click', function(){
    let number = this.getAttribute('data-number')

    number++

    this.setAttribute('data-number', number)
    let content = `<div class="logo_link_div border rounded ps-2 my-2">
                        <div class="text-end pe-2">
                            <i class="icon ri-delete-bin-2-line delete_link" onclick="removeElemnet(this)"></i>
                        </div>
                       
                        <div class="w-75 my-3">
                            <input type="file" class="form-control links_logo" name="links[${number}][logo]" onchange="add_link_image(this)">
                        </div>

                        <div class="logo_view_div my-3">

                        </div>

                        <div class="w-75 my-3">
                            <input type="url" class="form-control" id="items" name="links[${number}][link]"
                                >
                        </div>
                    </div>`

    document.querySelector('.links_div').insertAdjacentHTML('beforeend',content)
})


function add_link_image(e) {
    console.log(e.closest('.logo_link_div').querySelector('.logo_view_div'));
    let files = e.files;
    let content = ''
    let url = URL.createObjectURL(files[0])
    let type_arr = files[0].type.split('/')
    console.log(url)
    content += `<div class="d-flex file_div order-3">
                    <img src="${url}" class="img-thumbnail" style="width: 75px; height: 60px">
                </div>`


    e.closest('.logo_link_div').querySelector('.logo_view_div').innerHTML = content;
    // logoRemove()
    document.querySelectorAll('.item_remove').forEach( el => {
                    el.addEventListener('click', removeElemnet)

            })
}


// logo.forEach(el => {
//     el.addEventListener("change", (e) => {
//         console.log(e.target.closest('.logo_link_div').querySelector('.logo_view_div'));
//         let files = e.target.files;
//         let content = ''
//         for (var i = 0; i < files.length; i++){
//             let url = URL.createObjectURL(files[i])
//             let type_arr = files[i].type.split('/')
//             console.log(url)
//             content += `<div class="d-flex file_div order-3">
//                             <img src="${url}" class="img-thumbnail">
//                             <i data-key="${files[i].lastModified}" class="item_remove ri-delete-bin-2-line"></i>
//                         </div>`

//         }

//         document.querySelector('.map_image_view').innerHTML = content;
//         // logoRemove()
//         document.querySelectorAll('.item_remove').forEach( el => {
//                         el.addEventListener('click', removeFile)

//                 })
//     })
// })