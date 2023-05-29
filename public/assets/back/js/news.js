let logoDiv=document.getElementById('logo')
if(logoDiv!=null){

    logo.addEventListener("change", (e) => {
        document.querySelector('.logo_div').innerHTML=''

        let file = e.target.files;
        let url = URL.createObjectURL(file[0])

        document.querySelector('.logo_div').innerHTML = `<div class="d-flex file_div">
                                                            <img src="${url}">

                                                        </div>`;
        document.getElementById('image_error').innerHTML=''

    })
}
