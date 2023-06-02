let addBannerSection=document.getElementById('add_banner_section')
if(addBannerSection!=null){
    addBannerSection.addEventListener('click', function(e){

        let queue_section = e.target.getAttribute('data-quequ_section')*1
        let output=''
        lang.forEach((el)=>{

                  output+= `<div class="flex mb-2 p-2">
                                <label for="inputPassword" class="col-sm-2 col-form-label" >Description ${el['name'].toUpperCase()}</label>
                                <div class="col-sm-12">
                                <textarea class=" form-control create-section__textarea" name="section[${queue_section}][translations][${el['id']}][content]" id="label_section.${queue_section}.translations.${el['id']}.content"></textarea>
                                </div>
                            </div>
                            <div class="error_message" id="key_section.${queue_section}.translations.${el['id']}.content"></div>`

                })
                let content=`<div class="section_1" data-quequ=${queue_section}>
                                <i data-key="" id="logo_remove" class="item_remove  ri-delete-bin-2-line" style="position:absolute;right:5%"></i>
                                ${output}
                                <div class="flex mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file"  name="section[${queue_section}][path]"  accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                                    </div>
                                </div>
                                <div class="error_message" id="label_key_section.${queue_section}.path"> </div>
                            </div>`

        document.querySelector('.banner_section').insertAdjacentHTML('beforeend',content)
        document.getElementById('add_banner_section').setAttribute('data-quequ_section',queue_section+1)
        sectionRemove()

    })


}


function sectionRemove(){
    let sectionRemoves =  document.querySelectorAll('.item_remove')
    sectionRemoves.forEach((el) => {
            el.addEventListener('click', section_remove)
        })
}

function section_remove(){
    this.parentNode.remove()

}
let type=document.getElementById('banner').getAttribute('create')

banner.addEventListener('submit', (el) => {



    el.preventDefault()
    let url = '/banner/'
    let method = ''

    var formData = new FormData(banner)
    csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch(url,{
        method: 'POST',
        headers: {'X-CSRF-TOKEN':csrf },
        body: formData
    }).then(async response => {
            if (!response.ok) {
                const validation = await response.json();
                console.log(validation.errors)

                document.querySelectorAll('.create-section__textarea, .error_message').forEach(el => {
                    el.classList.remove('_incorrectly');
                    el.innerHTML = ''
                })


                for (const key in validation.errors) {
                    console.log(key)

                    if (validation.errors.hasOwnProperty.call(validation.errors, key)) {
                        const element = validation.errors[key][0];
                        console.log(key)

                        if(key.includes('path')){

                            document.getElementById('label_key_'+key).innerHTML=element;
                        }
                        if(key.includes('content')){
                            document.getElementById('label_'+key).classList.add('_incorrectly');
                            document.getElementById('key_'+key).innerHTML = element
                        }

                    }
                }
            }else{
                window.location.href = '/banner/'
            }
        })
})

let bannerPath=document.getElementById('banner_path')
if(bannerPath!=null){


    bannerPath.addEventListener("change", (e) => {

    document.querySelector('.image_path_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.image_path_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">

                                                    </div>`;
    document.getElementById('image_path_error').innerHTML=''

})

}
