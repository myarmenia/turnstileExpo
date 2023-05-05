
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

            let file_action=e.target.getAttribute('data-action')
            if(file_action=='edit'){
                delete_file(e.target.getAttribute('data-key'),e)

            }
        })
    }
}
// edit section
logoRemove()
function delete_file(obj,e){

        let url= '/delete_file/'+obj
         csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         fetch(url, {
             method: 'GET',
             headers: {'X-CSRF-TOKEN':csrf },

         }).then(async response => {
                 if (!response.ok) {


                 }else{
                     const success = await response.json();
                     // console.log(success)
                     if(success.message == 'deleted'){
                      window.location='/news/'+obj+'/edit'
                      document.querySelector('.btn').click()
                        //  e.parentNode.remove()
                     }

                 }
             })




}

