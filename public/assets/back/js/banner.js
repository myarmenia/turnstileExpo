
let bannerPath=document.getElementById('banner_path')
if(bannerPath!=null){

    bannerPath.addEventListener("change", (e) => {

    document.querySelector('.path_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.path_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">

                                                    </div>`;

      const path_message=document.getElementById('path_error_message')
     if(path_message!=null){
        path_message.innerHTML=' '
     }


})

}
